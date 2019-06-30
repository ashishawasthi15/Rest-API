<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\Employee;
use Validator;


class PostAPIController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Employee::all();
        return $this->sendResponse($posts->toArray(), 'index Posts retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get all input from request like id, emp_idetc
        $empdata = $request->all();

        // Set required field for body if we don't provide any data than it will show Validation error
        $validator = Validator::make($empdata, [
            'id' => 'required',
            'emp_id' => 'required',
             'epm_name' => 'required',
            'ip_address' => 'required'
       ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        // Insert employee data
        $post = Employee::create($empdata);

        return $this->sendResponse($post->toArray(), 'Post created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($ip_address)
    {
        if (Employee::where('ip_address', $ip_address)->exists()) {
            $employee = Employee::where('ip_address', $ip_address)->get()->toJson(JSON_PRETTY_PRINT);
            return response($employee, 200);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $post = Employee::find($id);
        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }

        $post->id = $input['id'];
        $post->emp_id = $input['emp_id'];
        $post->epm_name = $input['epm_name'];
        $post->ip_address = $input['ip_address'];
        $post->save();

        return $this->sendResponse($post->toArray(), 'Post updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ip_address)
    {
        if (Employee::where('ip_address', $ip_address)->exists()) {
            $employee = Employee::where('ip_address', $ip_address)->delete();
            return $this->sendResponse($ip_address, 'Data deleted successfully.');
        } else {
            return response()->json([
                "message" => "Ip Address not found"
            ], 404);
        }
       /*$post = Employee::find($ip_address);


        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }


        $post->delete();


        return $this->sendResponse($ip_address, 'Tag deleted successfully.');
  */
    }



}