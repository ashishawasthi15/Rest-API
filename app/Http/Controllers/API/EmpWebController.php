<?php

namespace App\Http\Controllers\API;

use http\Url;
use Illuminate\Http\Request;

use App\EmployeeHistory;
use App\Employee;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use Illuminate\Support\Facades\DB;
use Validator;

class EmpWebController  extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = EmployeeHistory::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$ip_address)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'ip_address' => 'required',
            'url'=> 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if (Employee::where('ip_address', $ip_address)->exists()) {
            $post = EmployeeHistory::create($input);
            return $this->sendResponse($ip_address, 'Data store successfully.');
        } else {
            return response()->json([
                "message" => "Ip Address not exist into employee table."
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $ip_address
     * @return \Illuminate\Http\Response
     */
    public function show($ip_address)
    {
            $result = DB::table('employees')
            ->join('employee_histories','employee_histories.ip_address','employees.ip_address')
            ->where('employees.ip_address','=',$ip_address)->select('employees.*','employee_histories.url') ->get();

        if ($result->count() > 0) {
         return $this->sendResponse($result->toArray(), 'index Posts retrieved successfully.');
        }  else
        {
            echo "Null- Not Matching Data , ip address doesn't have any data";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ip_address)
    {
        if (EmployeeHistory::where('ip_address', $ip_address)->exists()) {
            $employee = EmployeeHistory::where('ip_address', $ip_address)->delete();
            return $this->sendResponse($ip_address, 'Data deleted successfully.');
        } else {
            return response()->json([
                "message" => "Ip Address not found"
            ], 404);
        }
    }
}
