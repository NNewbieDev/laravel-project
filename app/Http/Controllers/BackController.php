<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
// use File;
use Illuminate\Support\Facades\File;
use App\Models\UserLevel;
use App\Models\System;
use App\Models\Article;
use App\Models\Category;
use App\Models\Social;
use App\Models\Role;
use App\Models\Contact;
use App\Models\PostProcess;
use Brian2694\Toastr\Facades\Toastr;

class BackController extends Controller
{
    private $postProcess;
    public function __construct()
    {
        $this->postProcess = new PostProcess();
        @session_start();
    }


    public function home()
    {
        return view('back.home.home');
    }
    // staff----------------------------------------------------------
    public function staff_profile()
    {
        return view('back.staff.profile');
    }

    public function staff_profile_post(Request $request)
    {
        if ($request->fullname == '' || $request->email == '' || $request->phone == '') {
            return redirect('admin/staff/profile')->with(['flash_level' => 'danger', 'flash_message' =>
            'vui lòng điền vào các trường có dấu *']);
        }

        $User = User::find($request->id);
        $User->fullname = $request->fullname;
        $User->adress = $request->adress;
        $User->email = $request->email;
        $User->phone = $request->phone;

        if (isset($request->password) && $request->password != '') {
            $User->password = bcrypt($request->password);
        }

        $Flag = $User->save();

        if ($Flag == true) {
            return redirect('admin/staff/profile')->with(['flash_lever' => 'success', 'flash_message' =>
            'Cập nhật thông tin tài khoản thành công.']);
        } else {
            return redirect('admin/staff/profile')->with(['flash_lever' => 'danger', 'flash_message' =>
            'Cập nhật thông tin tài khoản không thành công.']);
        }
    }

    public function staff_list()
    {

        // $User = DB::table('users as a')
        //     ->join('users_level as b', 'a.level', '=', 'b.id')
        //     ->selectRaw('a.id, a.fullname, a.adress, a.email, a.phone, b.name')->get();
        $User = DB::table('users as a')
            ->join('role as b', 'a.role', '=', 'b.id')
            ->selectRaw('a.*, b.role_name')
            ->get();
        return view('back.staff.list', compact('User'));
    }

    public function staff_add()
    {
        $UserLevel = UserLevel::where('status', 1)->get();

        return view('back.staff.add', compact('UserLevel'));
    }

    public function staff_add_post(Request $request)
    {
        if (
            $request->fullname == '' || $request->email == ''
            || $request->phone == '' || $request->username == '' || $request->password == ''
        ) {
            return redirect('admin/staff/add')->with(['flash_level' => 'danger', 'flash_message' =>
            'vui lòng điền vào các trường có dấu *']);
        }

        $User = new User;
        $User->level = $request->lavel;
        $User->status = 1;
        $User->username = $request->username;
        $User->password = bcrypt($request->password);
        $User->fullname = $request->fullname;
        $User->adress = $request->adress;
        $User->email = $request->email;
        $User->phone = $request->phone;
        $Flag = $User->save();
        if ($Flag == true) {
            return redirect('admin/staff/list')->with(['flash_level' => 'success', 'flash_message' =>
            'Thêm nhân viên thành công']);
        } else {
            return redirect('admin/staff/list')->with(['flash_level' => 'danger', 'flash_message' =>
            'Lỗi thêm nhân viên']);
        }
    }

    public function staff_edit(Request $request, $id)
    {
        $User = User::find($id);
        // $UserLevel = UserLevel::where('status', 1)->get();
        $UserLevel = Role::get();
        return view('back.staff.edit', compact('User', 'UserLevel'));
    }

    public function staff_edit_post(Request $request, $id)
    {

        if (
            $request->fullname == '' || $request->email == ''
            || $request->phone == ''
        ) {
            return redirect('admin/staff/add')->with(['flash_level' => 'danger', 'flash_message' =>
            'vui lòng điền vào các trường có dấu *']);
        }

        $User = User::find($id);
        $User->level = $request->lavel;
        $User->status = $request->status;

        if (isset($request->password) && $request->password != '') {
            $User->password = bcrypt($request->password);
        }

        $User->fullname = $request->fullname;
        $User->adress = $request->adress;
        $User->email = $request->email;
        $User->phone = $request->phone;
        $Flag = $User->save();
        if ($Flag == true) {
            return redirect('admin/staff/edit/' . $id)->with(['flash_level' => 'success', 'flash_message' =>
            'Chỉnh sửa nhân viên thành công']);
        } else {
            return redirect('admin/staff/edit/' . $id)->with(['flash_level' => 'danger', 'flash_message' =>
            'Lỗi chỉnh sửa nhân viên']);
        }
    }

    public function staff_delete(Request $request, $id)
    {
        $User = User::find($id);
        $Flag = $User->delete();

        if ($Flag == true) {
            return redirect('admin/staff/list')->with(['flash_level' => 'success', 'flash_message' =>
            'Xóa nhân viên thành công']);
        } else {
            return redirect('admin/staff/list')->with(['flash_level' => 'danger', 'flash_message' =>
            'Lỗi xóa nhân viên']);
        }

        // staff----------------------------------------------------------
    }
    //system----------------------------------------------------------

    public function system()
    {

        $name = System::where('Status', 1)->where('Code', 'name')->first();
        $email = System::where('Status', 1)->where('Code', 'email')->first();
        $phone = System::where('Status', 1)->where('Code', 'phone')->first();
        $address = System::where('Status', 1)->where('Code', 'address')->first();
        $copyright = System::where('Status', 1)->where('Code', 'copyright')->first();
        $logo = System::where('Status', 1)->where('Code', 'logo')->first();
        // $favicon = System::where('Status',1)->where('Code','favicon')->first();

        return view('back.system.system', compact(
            'name',
            'logo',
            'email',
            'address',
            'copyright',
            'phone'
        ));
    }


    public function system_post(Request $request)
    {

        if (
            $request->name == '' || $request->email == ''
            || $request->phone == ''
        ) {
            return redirect('admin/system')->with(['flash_level' => 'danger', 'flash_message' =>
            'vui lòng điền vào các trường có dấu *']);
        }
        //update tên công ty
        System::where('status', 1)
            ->where('Code', 'name')
            ->update(['Description' => $request->name]);

        System::where('status', 1)
            ->where('Code', 'email')
            ->update(['Description' => $request->email]);

        System::where('status', 1)
            ->where('Code', 'phone')
            ->update(['Description' => $request->phone]);

        System::where('status', 1)
            ->where('Code', 'address')
            ->update(['Description' => $request->address]);

        System::where('status', 1)
            ->where('Code', 'copyright')
            ->update(['Description' => $request->copyright]);
        if (!empty($request->file('logo'))) {

            $logo = System::where('Status', 1)->where('Code', 'logo')->first();
            $past = 'images/logo/' . $logo->Description;
            if (File::exists($past)) {
                File::delete($past);
            }
            //uơload images
            $name = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move('images/logo/', $name);
            $logo->Description = $name;
            $logo->save();
        }
        return redirect('admin/system')->with(['flash_level' => 'success', 'flash_message' =>
        'Cấu hình thành công']);
    }

    //system----------------------------------------------------------

    //page--------------------------------------------------------

    public function page_list()
    {
        $Page = Category::get();

        return view('back.page.list', compact('Page'));
    }

    public function page_edit(Request $request, $id)
    {

        $Page = Category::find($id);
        return view('back.page.edit', compact('Page'));
    }

    public function page_edit_post(Request $request, $id)
    {
        if ($request->Name == '' || $request->Font == '') {
            return redirect('admin/page/edit/' . $id)->with(['flash_level' => 'danger', 'flash_message' =>
            'vui lòng điền vào các trường có dấu *']);
        }

        $Page = Category::find($id);
        $Page->page_name = $request->name;
        $Page->status = $request->status;

        $Page->font = $request->font;
        $Page->sort = $request->sort;
        $Flag = $Page->save();
        if ($Flag == true) {
            return redirect('admin/page/edit/' . $id)->with(['flash_level' => 'success', 'flash_message' =>
            'Chỉnh sửa trang thành công']);
        } else {
            return redirect('admin/page/edit/' . $id)->with(['flash_level' => 'danger', 'flash_message' =>
            'Lỗi chỉnh sửa trang']);
        }
    }
    //page--------------------------------------------------------

    //post process check 

    public function post_process_list()
    {
        $postProcessList = $this->postProcess->getAllPost();

        return view('back.postProcess.list', compact('postProcessList'));
    }

    public function post_process_accept($id)
    {
        $post = $this->postProcess->getPost($id);
        $article = Article::insert([
            "title" => $post->title,
            "link" => $post->content,
            "description" => $post->image,
            "CategoryID" => $post->category_id,
            "AuthorID" => $post->author_id,
            "created_at" => $post->created_at,
        ]);
        $this->postProcess->deletePost($id);
        Toastr::success('Bài viết đã được phê duyệt!', 'Thành công');
        return back();
        // return redirect('admin/post-process/list')->with(['flash_level' => 'success', 'flash_message' =>
        // 'Bài viết đã được phê duyệt']);
    }

    public function post_process_refuse($id)
    {
        $this->postProcess->deletePost($id);
        Toastr::info('Bài viết không được phê duyệt và đang xóa!', 'Thông báo');
        return back();
        // return redirect('admin/post-process/list')->with(['flash_level' => 'success', 'flash_message' =>
        // 'Bài đã không được xét duyệt']);
    }

    //socical network---------------------------------------------
    public function social_list()
    {
        $Social = Social::get();

        return view('back.social.list', compact('Social'));
    }
    public function social_edit(Request $request, $id)
    {
        $Social = Social::find($id);
        return view('back.social.edit', compact('Social'));
    }

    public function social_edit_post(Request $request, $id)
    {

        if ($request->Name == '' || $request->Font == '') {
            return redirect('admin/social/edit/' . $id)->with(['flash_level' => 'danger', 'flash_message' =>
            'vui lòng điền vào các trường có dấu *']);
        }

        $Social = Social::find($id);
        $Social->Name = $request->Name;
        $Social->Status = $request->Status;

        $Social->Font = $request->Font;
        $Social->Sort = $request->Sort;
        $Flag = $Social->save();
        if ($Flag == true) {
            return redirect('admin/social/edit/' . $id)->with(['flash_level' => 'success', 'flash_message' =>
            'Chỉnh sửa trang thành công']);
        } else {
            return redirect('admin/social/edit/' . $id)->with(['flash_level' => 'danger', 'flash_message' =>
            'Lỗi chỉnh sửa trang']);
        }
    }

    //socical network---------------------------------------------

    //contact-----------------------------------------------------
    public function contact_list()
    {
        $Contact = Contact::get();

        return view('back.contact.list', compact('Contact'));
    }
    public function contact_edit(Request $request, $id)
    {
        $Contact = Contact::find($id);
        return view('back.contact.edit', compact('Contact'));
    }

    public function contact_edit_post(Request $request, $id)
    {

        // if ($request->Name == '' || $request->Font == '') 
        // {
        //     return redirect ('admin/social/edit/' .$id)->with(['flash_level'=> 'danger', 'flash_message' => 
        // 'vui lòng điền vào các trường có dấu *']);
        // }

        $Contact = Contact::find($id);
        $Contact->IsViews = $request->IsViews;

        // $Contact -> Name = $request ->Name;
        // $Contact -> Font = $request ->Font;
        // $Contact -> Sort = $request ->Sort;
        $Flag = $Contact->save();
        if ($Flag == true) {
            return redirect('admin/contact/edit/' . $id)->with(['flash_level' => 'success', 'flash_message' =>
            'Chỉnh sửa liên hệ thành công']);
        } else {
            return redirect('admin/contact/edit/' . $id)->with(['flash_level' => 'danger', 'flash_message' =>
            'Lỗi chỉnh sửa liên hệ']);
        }
    }

    public function contact_delete(Request $request, $id)
    {
        $Contact = Contact::find($id);
        $Flag = $Contact->delete();

        if ($Flag == true) {
            return redirect('admin/contact/list/')->with(['flash_level' => 'success', 'flash_message' =>
            'Xóa liên hệ thành công']);
        } else {
            return redirect('admin/contact/list/')->with(['flash_level' => 'danger', 'flash_message' =>
            'Lỗi xóa liên hệ']);
        }
    }
    //contact-----------------------------------------------------

}