<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;
use App\Models\Amenities;

class PropertyTypeController extends Controller
{
    public function AllType()
    {
        $types = PropertyType::latest()->get();
        return view('backend.type.all_type', compact('types'));
    } // end function

    public function AddType()
    {
        return view('backend.type.add_type');
    } // end function

    public function StoreType(Request $request)
    {
        // Validation
        $request->validate([
            'type_name'             =>'required|unique:property_types|max:200',
            'type-icon'             =>'required'
        ]);

        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

        $notification = array(
            'message'       => 'Property Type generated successfully',
            'alert-type'    => 'success'
        );

        return redirect()->route('store.type')->with($notification);
    } // end function

    public function EditType($id)
    {
        $types = PropertyType::findOrFail($id);
        return view('backend.type.edit_type', compact('types'));
    } // end function

    public function UpdateType(Request $request)
    {
        $pid = $request->id;
        PropertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

        $notification = array(
            'message'       => 'Property Type updated successfully',
            'alert-type'    => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    } // end function

    public function DeleteType($id)
    {
        PropertyType::findOrFail($id)->delete();
        $notification = array(
            'message'       => 'Property Type deleted successfully',
            'alert-type'    => 'success'
        );

        return redirect()->back()->with($notification);
    } // end function

    /*Start Amenities All Methods*/

    public function AllAmenities()
    {
        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_amenities', compact('amenities'));
    } // end function

    public function AddAmenities()
    {
        return view('backend.amenities.add_amenities');
    } // end function

    public function StoreAmenities(Request $request)
    {
        Amenities::insert([
            'amenities_name' => $request->amenities_name
        ]);

        $notification = array(
            'message'       => 'Amenities generated successfully',
            'alert-type'    => 'success'
        );

        return redirect()->route('all.amenities')->with($notification);
    } // end function

    public function EditAmenities($id)
    {
        $amenities = Amenities::findOrFail($id);
        return view('backend.amenities.edit_amenities', compact('amenities'));
    } // end function

    public function UpdateAmenities(Request $request)
    {
        $am_id = $request->id;
        Amenities::findOrFail($am_id)->update([
            'amenities_name' => $request->amenities_name
        ]);

        $notification = array(
            'message'       => 'Amenities updated successfully',
            'alert-type'    => 'success'
        );

        return redirect()->route('all.amenities')->with($notification);
    } // end function

    public function DeleteAmenities($id)
    {
        Amenities::findOrFail($id)->delete();
        $notification = array(
            'message'       => 'Amenity deleted successfully',
            'alert-type'    => 'success'
        );

        return redirect()->back()->with($notification);
    } // end function

    /*End Amenities All Methods*/
}
