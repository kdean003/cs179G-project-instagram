<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $postsArr = DashboardController::loadDashboard($request);

        $myPosts = PostController::getCurrentUserPosts();
        $myFollowers = PostController::getFollowers();
        $myFollowings = PostController::getFollowings();
        $mySocialRating = PostController::getHCAY();

        // echo "<pre>";
        // var_export($postsArr);
        // echo "</pre>";
        // exit;
        return view('dashboard')
            ->with('postsArr', $postsArr)
            ->with('myPosts', $myPosts)
            ->with('myFollowers', $myFollowers)
            ->with('myFollowings', $myFollowings)
            ->with('mySocialScore', $mySocialRating[0])
            ->with('myRating', $mySocialRating[1])
            ->with('filterSelection', $request->filter_method);
    }
}
