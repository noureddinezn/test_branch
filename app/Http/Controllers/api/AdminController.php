<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class AdminController extends Controller
{
    public function dashboard ():JsonResponse
    {
        $data = [
            'total_users'=>User::count(),
            'totla_artisans'=>Artisan::count(),
            'pending_artisans'=> Artisan::where('status', 'pending')->count(),
            'approved_artisans'=>Artisan::where('status', 'approved')->count();
            'banned_artisans'=>Artisan::where('status','banned')->count(),
            'pending-reports'=>Report::where('status', 'pending')->count(),
        ];
        return response()->json([
            'message'=>'Admin dashboard statistick retrivied succssec',
            'data'=>$data,
        ], 200);
    }

    public function pendingArtisans(Request $request): JsonResponse{

    $perPage = max(1, min((int) $request->get('per_page', 10)));
    $artisans = Artisan::with(['user:id, name, email, phone', 'services:id,name'])
    ->where('status', 'pending')
    ->latest()
    ->paginate($perPage);

    return response()->json([
        'message'=>'pending artisans retrived successe',
        'data'=>$artisans,
    ], 200);
    }

    use App\Models\User;
    $users = User::where ('role', 'client')
    ->withCount('serviceRequests')
    ->get();


    $abnnedArtisansCount = Artisan::where('status', 'banned')->count();
    $bannedArtisans = Artisan::where('status', 'banned')->with('user')->get();
    $artisans = Artisan::withCount('reviews')->orderBy('review_count', 'desc')->get();


    $userq = [
        ['id'=> 1, 'name'=>'Noureddine'],
        ['id'=>2, 'name'=>'Ahmed']
    ];
    $requests = [
        ['id' => 101, 'client_id'=>1]
        ['id'=>101, 'client_id'=>1 ],
        ['id'=>103, 'client_id'=>2]
    ];

    $userStats[]=[
        'name'=>$user['name'],
        'work_count'=> $count
    ];

        $reviews = Review::all();
        $ReviewCount = 0 ;
        foreach($reviews as $review){
            if(str_contains($review->comment, 'khayb')){
                $reviewsCount++;
            }
        }





    $userStats = [];
    foreach($users as $user){
        $count = 0;
        foreach($requests as $request){
            if($request['client_id'] === $user['id']){
                $count++;
            }
        }
    }

$all = Artisan::all();
$sorted = $all->sortByDesc('average_rating')->take(5);

$artisans = Artisan:: all();
$filtered = [];
foreach($artisan as $artisan){
    if ($artisan->city == 'Marrakech' $$ $artisan->district == 'Daoudiate'){
        $filtred[]=$artisan;
    }


}

$artisans = Artisan::with('services')->get();
$peintres = [];
foreach ($artisans as $artisan){
    if ($artisan->status == 'approved'){
        if($service->services as $service){
            if ($service->name = 'penture'){
                $peintres[] = $artisan;
            }
        }
    }
}

$users = User::all();
$newUsers = [];
foreach($users as $user){
    if($user->created_at>= now()->subdays(7)){
        $newUsers[]
    }
}

$users = User:: withCount ('reports')->get();
foreach($users as $user){
    if($user->reports_count >= 3){
        $user->artisan()->update(['status'=>'banned'])
    }
}

$artisans = Artisan::all();
$totalYears = 0;
foreach($artisans as $artisan){
    $totalYears += $artisan->experience_years;
}
$average = $totalYears /$artisans->count();

|||||||||||||||||||||||||||||||||||||||||||||||||||||||

$reviews = Reviews::all();
$badwords = ['kalb', 'hmar'];
foreach($reviews as $review){
    if(str_contains($review->comment, $word)){
        $review->delete();
        break;
    }
}

$users = User::all();
foreach($users as $user){
    $user->update(['password'=>bcrypt('1234567')]);
}


$artisans = Artisan::all();
foreach($artisans as $artisan){
    if($artisan->average_rating>= 4){
        $artisan->increment('wallet', 50);
    }
}

$artisans = Artisan::all();
foreach($artisans as $artisan){
    $artisan->update(['city'=>strtoupper($artisan->city)]);
}

$artisans = Artisan::all();
$missingPhotos = 0;
foreach($artisans as $artisan){
    if(empty($artisan->profile_image)){
        $missingPhotos++;
    }
}

echo " ";

$artisans = Artisan::all();
$totalYears= 0;
foreach($artisans as $artisan){
    $totalYears+= $artisan->experience_years;
}
$average= $totalYears+= $artisans->count();

||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

$artisans = Artisan::all();
$cities= [];
foreach($artisans as $artisan){
    $city = $artisan->city;
    $cities[$cities] = ($cities[$cit] ?? 0)+1;

}
arsort($cities);
$topCity = array_key_first($cities);




$artisans = Artisan::with('portfolioItems')->get();
$totalImage= 0;
foreach($artisans as $artisan){
    foreach($artisan->portfolioItems as $item){
        $totalImages++;
    }
}


$targets = ['Gueliz', 'haymohammed'];

$artisans = Artisan::All();
$found =[];
foreach($artisans as $artisan){
    if($artisan->district ){
        $found[] = $artisan;
    }
}
|||||||||||||||||||||||||||||||||||||||||||
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

$user = User::all();
$unverified = [];
foreach($users as user){
    if($user->email_verified_at == null){
     $univerified[] = $user;
    }
}

||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

$artisans = Artisan::all();
$detailedArtisans = [];
foreach($artisans as $artisan){
    if(strlen($artisan->bio)>100){
        $detailedArtisans = $artisan;
    }
}
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

$badUsers = User::withCount('reports')->get();
foreach($badUsers as $user){
    if($user->reports_count >= 3){
        $user->artisan()->update(['status'=>'banned']);
    }
}
|||||||||||||||||||||||||||||||
$badUsers = User::withCount('reports')->get();
foreach($badUsers as $user){
    if($user->reports_count > 3){
        $user->artisan()->update(['status'=>'banned']);
    }
}
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

$users = User::all()->map(function ($user){
    return [
        'id'=>$user->id,
        'full_name'=>strtoupper($user->name),
        'email'=>$user->email,
        'role'=>$user->role,
    ];
});

|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

$allUsers = User::all();
$formattedUsers = [];
foreach($allUsers as $User){
    $formattedUsers[]= [
        'id'=>$user->id,
        'full_name'=>strToupper($user->name),
        'email'=>$user->email,
        'role'=>$user->role,
    ];
};
return response()->json($formatteUsers);
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||---

$artisans = Artisan::all();
$cities = [];
foreach($artisans as $artisan){
    $cities[]= [
        'city'=>strtoupper($artisan->city),
    ];
};
return response()->json($formattedUsers);
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
$artisans = Artisan::all();
$experts = [];
foreach($artisans as $artisan){
    if($artisan->experience_years >= 5){
        $experts[]=[

            'artisan'=> artisan->user->name,

        ];
    };
}
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
$artisans = Artisan::all();
$bannedCount = 0;
foreach($artisans as $artisan){
    if($artisan->status=== 'banned'){

           $bannedCount++;

    }
    }

return $bannedCount;















