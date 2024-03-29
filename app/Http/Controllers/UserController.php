<?php

namespace App\Http\Controllers;

use App\Models\Sewa;
use App\Models\User;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $mobils = Mobil::all();
        return view('welcome', ['mobils' => $mobils]);
    }

    public function show($id)
    {
        $mobil = Mobil::find($id);
        // dd($mobil->image);
        return view('user.show', ['mobil' => $mobil]);
    }

    public function sewa(Request $request, $id)
    {
        $mobil = Mobil::find($id);
        $user = Auth::user();
        $awal_sewa = $request->input('awal_sewa');
        $akhir_sewa = $request->input('akhir_sewa');
        $tarif = $request->input('tarif');

        // dd($user->id);
        // $sewa = Sewa::create([
        //     'user_id' => $user->id,
        //     'mobil_id' => $mobil->id,
        //     'status' => 'Disewa',
        //     'awal_sewa' => $awal_sewa,
        //     'akhir_sewa' => $akhir_sewa,
        //     'tarif' => $tarif
        // ]);

        // $mobil->status = 'Disewa';
        // $mobil->save();





        //SAMPLE REQUEST START HERE

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $tarif,
            ),
            'customer_details' => array(
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);

        return view('user.show', [
            'mobil' => $mobil,
            'pesan' => "Berhasil Menyewa Mobil {$mobil->merk} dengan Tipe {$mobil->model}",
            'snapToken' => $snapToken
        ]);
    }


    public function showUser()
    {
        $user_id = Auth::user()->id;
        $data_pinjam = Sewa::where('user_id', $user_id)->get();

        return view('user.showUser', ['data_pinjam' => $data_pinjam]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $mobils = Mobil::whereRaw('LOWER(merk) LIKE ?', ['%' . strtolower($search) . '%'])
            ->orWhereRaw('LOWER(model) LIKE ?', ['%' . strtolower($search) . '%'])
            ->orWhereRaw('LOWER(nomor_plat) LIKE ?', ['%' . strtolower($search) . '%'])
            ->orWhereRaw('LOWER(status) LIKE ?', ['%' . strtolower($search) . '%'])
            ->get();

        // dd($mobils);

        return view('user.search', ['mobils' => $mobils]);
    }

    public function profile()
    {
        $user = Auth::user();
        $sewas = Sewa::where('user_id', $user->id)->get();

        // Menggunakan loop untuk mendapatkan mobil dan tanggal terkait untuk setiap sewa
        $dataSewas = [];
        foreach ($sewas as $sewa) {
            $mobil = Mobil::find($sewa->mobil_id);
            if ($mobil) {
                $dataSewas[] = [
                    'merk' => $mobil->merk,
                    'model' => $mobil->model,
                    'awal_sewa' => $sewa->awal_sewa, // Sesuaikan dengan nama kolom awal_sewa di tabel Sewa
                    'akhir_sewa' => $sewa->akhir_sewa,
                    'status' => $sewa->status, // Sesuaikan dengan nama kolom tanggal di tabel Sewa
                ];
            }
        }

        // dd($dataSewas);

        return view('user.profile', ['user' => $user, 'dataSewas' => $dataSewas]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'nomor_sim' => $request->nomor_sim,
        ];

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image) {
                $oldImagePath = public_path($user->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image/user'), $imageName);
            $data['image'] = 'image/user/' . $imageName;
        }

        // Check if password is provided and update it
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        // Update user data
        $user->update($data);

        return redirect('/profile');
    }
}
