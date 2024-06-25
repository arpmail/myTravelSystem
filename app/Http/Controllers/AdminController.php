<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

use Symfony\Component\Process\Process;

use Symfony\Component\Process\Exception\ProcessFailedException;
 
class AdminController extends Controller
{

    public function travel(Request $request)
    {
        // outputs the username that owns the running php/httpd process
        // (on a system with the "whoami" executable in the path)

        // $output=null;
        // $retval=null;
        // exec('python pyscript\\travel.py', $output, $retval);
        // exec('Taskkill /IM "chromedriver.exe" /F');
        // echo "Returned with status $retval and output:\n";
        // print_r($output);
        // return redirect()->back()->with('messageTravel','The scraping has started!');

        $process = new Process(['pyscript\\travel.bat']);
        $process->run();

        // error handling
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $output_data = $process->getOutput();
        echo $output_data;

        // $output = shell_exec("pyscript\\travel.bat 2>&1");

        // return $output;
    }

    public function covid(Request $request)
    {
        // outputs the username that owns the running php/httpd process
        // (on a system with the "whoami" executable in the path)
        $output=null;
        $retval=null;
        exec('python pyscript\\covid.py', $output, $retval);
        echo "Returned with status $retval and output:\n";

        return redirect()->back()->with('messageCovid','The scraping has started!');
        // $process = new Process(['C:\Program Files\Python310\python.exe', 'pyscript\\test.py']);
        // $process->run();

        // // error handling
        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }

        // $output_data = $process->getOutput();
        // echo $output_data;
    }

    public function product()
    {
        return view('admin.product');
    }

    public function showproduct()
    {
        $data=product::all();
        return view('admin.showproduct',compact('data'));
    }

    public function cron()
    {
        return view('admin.cron');
    }

    

}
