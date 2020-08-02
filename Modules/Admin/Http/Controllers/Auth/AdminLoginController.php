<?php

namespace Modules\Admin\Http\Controllers\Auth;

use App\Country;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\View;
use Modules\Admin\Entities\AdminLoginHistory;
use Modules\Admin\Entities\AdminRole;
use Modules\Admin\Services\Location;
use Modules\Admin\Services\Permission;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin:admin')->except('logout', 'logoutAuto');

        View::composer("*", function ($view){

            $template = str_replace("/", "-", request()->path());
            $view->with("template", $template);
        });
    }

    protected function guard()
    {
        return Auth::guard("admin");
    }

    /**
     * Show the login form.
     *
     * @return Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin::auth.login',[
            'title' => 'Admin Login',
            'loginRoute' => route('dashboard.login'),
            'forgotPasswordRoute' => 'dashboard.password.request',
        ]);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            return route('dashboard.login');
        }
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @param $admin
     * @return mixed
     */
    protected function authenticated(Request $request, $admin)
    {
        if($admin->status == "1")
        {
            if($admin->default_admin == "1")
            {
                //this admin have access to all the operations of the system
                $request->session()->put("default_admin", true);

                $notify["status"] = "success";
                $notify["notify"][] = "You just signed in successfully.";
                $notify["notify"][] = "You are welcome " . $admin["name"] . ".";

                $request->session()->flash("notify", $notify);

                $this->recordLoginActivity($admin->id);

                return redirect()->intended(route('dashboard.home'));
            }
            else
            {
                $request->session()->put("default_admin", false);

                //get user role status
                $adminRole = AdminRole::find($admin["admin_role_id"]);

                if ($adminRole->role_status == "1")
                {
                    $notify["status"] = "success";
                    $notify["notify"][] = "You just signed in successfully.";
                    $notify["notify"][] = "You are welcome " . $admin["name"] . ".";

                    $request->session()->flash("notify", $notify);

                    //this is a normal admin, we have to gather permission data of this user
                    $permissions = Permission::getPermissions($admin->id, $adminRole->admin_role_id);
                    $request->session()->put("permissions", $permissions);

                    $this->recordLoginActivity($admin->id);

                    return redirect()->intended(route('dashboard.home'));
                }
                else
                {
                    if ($adminRole->disabled_reason != "")
                    {
                        $notify["status"] = "failed";
                        $notify["notify"][] = "Your admin role has been disabled due to following reason.";
                        $notify["notify"][] = $adminRole->disabled_reason;

                        $request->session()->flash("notify", $notify);

                        $loginFailedReason = $adminRole["disabled_reason"];
                    }
                    else
                    {
                        $notify["status"] = "failed";
                        $notify["notify"][] = "Your admin role has been disabled.";
                        $notify["notify"][] = "Please contact system administrator for more information.";

                        $loginFailedReason = "Admin role has been disabled";

                        $request->session()->flash("notify", $notify);
                    }

                    $this->recordLoginActivity($admin->id, true, $loginFailedReason);

                    return redirect()->back();
                }
            }
        }
        else
        {
            $this->guard()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            $notify["status"]="failed";
            if ($admin->disabled_reason!= "")
            {
                $notify["notify"][]="Your account has been disabled due to following reason";
                $notify["notify"][]=$admin->disabled_reason;
                $notify["notify"][]="Please contact system administrator for more information.";

                $loginFailedReason = $admin->disabled_reason;
            }
            else
            {
                $notify["notify"][]="Your account has been disabled.";
                $notify["notify"][]="Please contact system administrator for more information.";

                $loginFailedReason = "Admin account has been disabled.";
            }

            $request->session()->flash("notify", $notify);
            $this->recordLoginActivity($admin->id, true, $loginFailedReason);

            return redirect()->back();
        }
    }

    /**
     * Get the failed login response instance.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $notify["status"]="failed";
        $notify["notify"][]="Signing into the system was failed.";
        $notify["notify"][]="Please try again.";

        $request->session()->flash("notify", $notify);

        return redirect()->back();
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     * @param int $manual
     * @return mixed
     */
    public function logout(Request $request, $manual=1)
    {
        $adminLoginHistoryId = $request->session()->get("admin_login_history_id");

        $this->recordLogOutActivity($adminLoginHistoryId, $manual);

        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if($manual)
        {
            $notify["status"]="success";
            $notify["notify"][]="You just signed out successfully.";
            $notify["notify"][]="See you again soon.";
        }
        else
        {
            $notify["status"]="warning";
            $notify["notify"][]="Your session has been expired due to inactivity.";
        }

        if($request->expectsJson())
        {
            $response["notify"]=$notify;
            return response()->json($response, 201);
        }
        else
        {
            $request->session()->flash("notify", $notify);
            return redirect()->route('dashboard.login');
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logoutAuto(Request $request)
    {
        return $this->logout($request, 0);
    }

    private function recordLogOutActivity($adminLoginHistoryId)
    {
        $lh = AdminLoginHistory::find($adminLoginHistoryId);
        $lh->online_status = 0;
        $lh->sign_out_type = 1; //manual sign out
        $lh->sign_out_at = date("Y-m-d H:i:s", time());

        $lh->save();
    }

    private function recordLoginActivity($adminId, $failed=false, $loginFailedReason="")
    {
        $ip = Location::getClientIP();
        $geoData = Location::getGeoData($ip);

        $countryCode = $geoData["countryCode"];

        $country = Country::where("country_code", "=", $countryCode)->first();

        $countryId = null;
        if($country)
        {
            $countryId = $country->country_id;
        }

        $adminLH = new AdminLoginHistory();
        $adminLH->admin_id = $adminId;
        $adminLH->login_ip = $ip;
        $adminLH->country_id = $countryId;
        $adminLH->city = $geoData["city"];
        if($failed)
        {
            $adminLH->login_failed_reason = $loginFailedReason;
        }
        else
        {
            $adminLH->online_status = 1;
        }
        $adminLH->last_activity_at = date("Y-m-d H:i:s", time());
        $adminLH->sign_in_at = date("Y-m-d H:i:s", time());

        $save = $adminLH->save();

        if($save)
        {
            $primaryKey = $adminLH->getKeyName();
            $admin_login_history_id = $adminLH->$primaryKey;

            request()->session()->put("admin_login_history_id", $admin_login_history_id);
        }
    }
}
