<?php

namespace App\Http\Controllers;
use App\UserDescription;
use App\Hostels; 
use Illuminate\Http\Request;
use Hash;
class ProfileController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $data['user'] = $user;
        $data['userDescription'] = $user->userDescription; // Adjust this according to your actual relationship name
        
        return view('profile.dashboard', $data);
    }

   
    public function edit_profile(){
    	$user=auth()->user();
    	$data['user']=$user;
    	return view('profile.edit_profile',$data);
    }

    public function update_profile(Request $request){
    	 $request->validate([
         'first_name'=>'required|min:2|max:100',
         'last_name'=>'required|min:2|max:100',
         ],[
            'first_name.required'=>'First name is required',
            'last_name.required'=>'Last name is required',
         ]);

         $user=auth()->user();

         $user->update([
         	'first_name'=>$request->first_name,
         	'last_name'=>$request->last_name,
         ]);

         return redirect()->route('edit_profile')->with('success','Profile successfully updated');

    }

    public function change_password(){ 
        return view('profile.change_password');
    }


    public function update_password(Request $request){
        $request->validate([
        'old_password'=>'required|min:6|max:100',
        'new_password'=>'required|min:6|max:100',
        'confirm_password'=>'required|same:new_password'
        ]);

        $current_user=auth()->user();

        if(Hash::check($request->old_password,$current_user->password)){

            $current_user->update([
                'password'=>bcrypt($request->new_password)
            ]);

            return redirect()->back()->with('success','Password successfully updated.');

        }else{
            return redirect()->back()->with('error','Old password does not matched.');
        }



    }
    public function edit_userinfo(){
        $user=auth()->user();
    	$data['user']=$user;
    	return view('profile.user_desc',$data);
    }

    public function updateUserinfo(Request $request)
    {
        $request->validate([
            'gender' => 'nullable|string|max:255',
            'admission_number' => 'nullable|integer',
            'personality' => 'nullable|string',
            'describe_yourself' => 'nullable|string',
        ]);
    
        // Retrieve authenticated user
        $user = auth()->user();
    
        // Update or create user description
        $userDescription = UserDescription::updateOrCreate(
            ['user_id' => $user->id],
            [
                'gender' => $request->gender,
                'admission_number' => $request->admission_number,
                'personality' => $request->personality,
                'describe_yourself' => $request->describe_yourself,
            ]
        );
    
        return redirect()->route('edit_userinfo')->with('success', 'Profile updated successfully');
    }

public function hostel_info_main()
{
    $user = auth()->user();
    $hostel = Hostels::where('user_id', $user->id)->first(); // Retrieve hostel info for the authenticated user

    // Check if hostel information exists
    if ($hostel) {
        return view('profile.hostelinfo', compact('user', 'hostel'));
    } else {
        return redirect()->route('update_hostel_info'); // Redirect to update page if hostel info doesn't exist
    }
}


public function hostel_info(){
    $user=auth()->user();
    $data['user']=$user;
    return view('profile.hostel_info',$data);
}

public function updatehostel_info(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'address' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:255',
        'rent' => 'nullable|integer',
        'amenities' => 'nullable|string|max:255',
        'rules' => 'nullable|string',
        'availability' => 'nullable|boolean',
        'number_beds' => 'nullable|integer',
        'vacant_beds' => 'nullable|integer',
        'constant_water_supply' => 'nullable|boolean',
        'private_security' => 'nullable|boolean',
        'parking_space' => 'nullable|boolean',
        'caretaker' => 'nullable|boolean',
    ]);

    // Retrieve authenticated user
    $user = auth()->user();

    // Update or create hostel info
    $hostel = Hostels::updateOrCreate(
        ['user_id' => $user->id], // Find the hostel record by user_id or create a new one if not found
        [
            'address' => $request->address,
            'description' => $request->description,
            'rent' => $request->rent,
            'amenities' => $request->amenities,
            'rules' => $request->rules,
            'availability' => $request->availability,
            'number_beds' => $request->number_beds,
            'vacant_beds' => $request->vacant_beds,
            'constant_water_supply' => $request->constant_water_supply,
            'private_security' => $request->private_security,
            'parking_space' => $request->parking_space,
            'caretaker' => $request->caretaker,
        ]
    );

    return redirect()->route('hostel_info')->with('success', 'Hostel information updated successfully');
}


}
