<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
class CertificateController extends Controller
{
    // admin login
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // all certificates
    public function certificates()
    {
        $certificates = Certificate::with('eng')->latest()->paginate(10);
        return view('dashboard.certificates.certificates',[
            'certificates' => $certificates
        ]);
    }
    // detailsCertificate
    public function detailsCertificate($id)
    {
        $certificate = Certificate::with('eng','work')->find($id);
        return view('dashboard.certificates.details',[
            'certificate' => $certificate
        ]);
    }
    // export Certificate
    public function exportCertificate($id)
    {
        $certificate = Certificate::with('eng')->first();
        dd($certificate);
    }
}
