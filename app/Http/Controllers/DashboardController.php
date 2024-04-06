<?php

namespace App\Http\Controllers;

use AndreasElia\Analytics\Models\PageView;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Couchbase\AnalyticsResult;
use Illuminate\View\View;
use Morilog\Jalali\Jalalian;

class DashboardController extends Controller
{
    public function index(): View
    {
        $studentsCount = User::all()->count();
        $postsCount = Post::all()->count();
        $comments = Comment::orderBy('created_at', 'desc')->paginate(30);

        // Analytics
        $lastWeekDates = collect(range(0, 6))->map(function ($i) {
            $date = Jalalian::now()->subDays($i);
            return $date->format('l');
        });
        // fixme: wrong results
        $currentWeekViews = PageView::query()->scopes(['filter' => ["1_week"]])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as views_count')
            ->groupBy('date')
            ->pluck('views_count');
        while (count($currentWeekViews) < 7) {
            $currentWeekViews[] = 0;
        }

        $currentWeekViewers = PageView::query()->scopes(['filter' => ["1_week"]])
            ->groupBy('session')
            ->selectRaw('DATE(created_at) as date, COUNT(*) as viewers_count')
            ->groupBy('date')
            ->pluck('viewers_count');
        while (count($currentWeekViewers) < 7) {
            $currentWeekViewers[] = 0;
        }

        $totalViews = $currentWeekViews[0];
        $totalViewers = $currentWeekViewers[0];

        return view('admin.index',
            compact(
                'studentsCount',
                'postsCount',
                'comments',
                'totalViewers',
                'totalViews',
                'currentWeekViews',
                'currentWeekViewers',
                'lastWeekDates'
            ));
    }
}
