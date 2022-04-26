<?php

namespace App\Http\Controllers;

use App\Gaji;
use App\Role;
use App\User;
use App\Rumah;
use App\Bidang;
use App\Booking;
use App\Jabatan;
use App\Pangkat;
use App\Pegawai;
use App\Pembeli;
use App\Karyawan;
use App\Penjualan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class SuperadminController extends Controller
{
    public function beranda()
    {
        return view('superadmin.beranda');
    }

    public function karyawan()
    {
        $data = Karyawan::orderBy('id', 'DESC')->paginate(10);
        return view('superadmin.karyawan.index', compact('data'));
    }
    public function karyawancreate()
    {
        return view('superadmin.karyawan.create');
    }
    public function karyawanstore(Request $req)
    {
        $attr = $req->all();
        Karyawan::create($attr);
        toastr()->success('Berhasil disimpan');
        return redirect('/superadmin/karyawan');
    }
    public function karyawanedit($id)
    {
        $data = Karyawan::find($id);
        return view('superadmin.karyawan.edit', compact('data'));
    }
    public function karyawanupdate(Request $req, $id)
    {
        $attr = $req->all();
        Karyawan::find($id)->update($attr);
        toastr()->success('Berhasil diupdate');
        return redirect('/superadmin/karyawan');
    }
    public function karyawandelete($id)
    {
        Karyawan::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    public function rumah()
    {
        $data = Rumah::paginate(10);
        return view('superadmin.rumah.index', compact('data'));
    }

    public function rumahcreate()
    {
        return view('superadmin.rumah.create');
    }
    public function rumahstore(Request $req)
    {
        $attr = $req->all();

        Rumah::create($attr);
        toastr()->success('Berhasil disimpan');
        return redirect('/superadmin/rumah');
    }
    public function rumahedit($id)
    {
        $data = Rumah::find($id);
        return view('superadmin.rumah.edit', compact('data'));
    }
    public function rumahupdate(Request $req, $id)
    {
        $attr = $req->all();
        Rumah::find($id)->update($attr);
        toastr()->success('Berhasil diupdate');
        return redirect('/superadmin/rumah');
    }
    public function rumahdelete($id)
    {
        Rumah::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }


    public function pembeli()
    {
        $data = Pembeli::orderBy('id', 'DESC')->paginate(10);
        return view('superadmin.pembeli.index', compact('data'));
    }
    public function pembelicreate()
    {
        return view('superadmin.pembeli.create');
    }
    public function pembelistore(Request $req)
    {
        $attr = $req->all();
        Pembeli::create($attr);
        toastr()->success('Berhasil disimpan');
        return redirect('/superadmin/pembeli');
    }
    public function pembeliedit($id)
    {
        $data = Pembeli::find($id);
        return view('superadmin.pembeli.edit', compact('data'));
    }
    public function pembeliupdate(Request $req, $id)
    {
        $attr = $req->all();
        Pembeli::find($id)->update($attr);
        toastr()->success('Berhasil diupdate');
        return redirect('/superadmin/pembeli');
    }
    public function pembelidelete($id)
    {
        Pembeli::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    public function booking()
    {
        $data = Booking::orderBy('id', 'DESC')->paginate(10);
        return view('superadmin.booking.index', compact('data'));
    }
    public function bookingcreate()
    {
        $pembeli = Pembeli::get();
        $rumah = Rumah::get();
        return view('superadmin.booking.create', compact('pembeli', 'rumah'));
    }
    public function bookingstore(Request $req)
    {
        $rumah = Rumah::find($req->rumah_id);
        $attr = $req->all();
        $attr['kode_rumah'] = $rumah->kode_rumah;
        $attr['type'] = $rumah->type;
        $attr['luas_tanah'] = $rumah->luas_tanah;
        $attr['luas_bangunan'] = $rumah->luas_bangunan;
        $attr['uang_muka_pesan'] = $rumah->uang_muka_pesan;

        Booking::create($attr);
        toastr()->success('Berhasil disimpan');
        return redirect('/superadmin/booking');
    }
    public function bookingedit($id)
    {
        $data = Booking::find($id);
        $pembeli = Pembeli::get();
        $rumah = Rumah::get();
        return view('superadmin.booking.edit', compact('data', 'pembeli', 'rumah'));
    }
    public function bookingupdate(Request $req, $id)
    {
        $rumah = Rumah::find($req->rumah_id);
        $attr = $req->all();

        $attr['kode_rumah'] = $rumah->kode_rumah;
        $attr['type'] = $rumah->type;
        $attr['luas_tanah'] = $rumah->luas_tanah;
        $attr['luas_bangunan'] = $rumah->luas_bangunan;
        $attr['uang_muka_pesan'] = $rumah->uang_muka_pesan;
        Booking::find($id)->update($attr);
        toastr()->success('Berhasil diupdate');
        return redirect('/superadmin/booking');
    }
    public function bookingdelete($id)
    {
        Booking::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return redirect('/superadmin/booking');
    }

    public function penjualan()
    {
        $data = Penjualan::orderBy('id', 'DESC')->paginate(10);
        return view('superadmin.penjualan.index', compact('data'));
    }
    public function penjualancreate()
    {
        $rumah = Rumah::get();
        $karyawan = Karyawan::get();
        $pembeli = Pembeli::get();
        return view('superadmin.penjualan.create', compact('rumah', 'karyawan', 'pembeli'));
    }
    public function penjualanstore(Request $req)
    {
        $attr = $req->all();
        if ($req->jenis == 'T') {
            $attr['cash'] = Rumah::find($req->rumah_id)->harga_cash;
        } else {
            if ($req->lama_kredit == '10') {
                $attr['cicilan'] = Rumah::find($req->rumah_id)->harga_kredit10;
            } elseif ($req->lama_kredit == '15') {
                $attr['cicilan'] = Rumah::find($req->rumah_id)->harga_kredit15;
            } elseif ($req->lama_kredit == '20') {
                $attr['cicilan'] = Rumah::find($req->rumah_id)->harga_kredit20;
            }
            $attr['uang_muka'] = Rumah::find($req->rumah_id)->uang_muka_kredit;
        }

        Penjualan::create($attr);
        toastr()->success('Berhasil disimpan');
        return redirect('/superadmin/penjualan');
    }
    public function penjualanedit($id)
    {
        $data = Penjualan::find($id);

        $rumah = Rumah::get();
        $karyawan = Karyawan::get();
        $pembeli = Pembeli::get();
        return view('superadmin.penjualan.edit', compact('data', 'rumah', 'karyawan', 'pembeli'));
    }
    public function penjualanupdate(Request $req, $id)
    {
        if ($req->jenis == 'K') {
            if ($req->lama_kredit == null) {
                toastr()->error('Lama Kredit Kosong');
                return back();
            }
        }
        $attr = $req->all();
        if ($req->jenis == 'T') {
            $attr['cash'] = Rumah::find($req->rumah_id)->harga_cash;
        } else {
            if ($req->lama_kredit == '10') {
                $attr['cicilan'] = Rumah::find($req->rumah_id)->harga_kredit10;
            } elseif ($req->lama_kredit == '15') {
                $attr['cicilan'] = Rumah::find($req->rumah_id)->harga_kredit15;
            } elseif ($req->lama_kredit == '20') {
                $attr['cicilan'] = Rumah::find($req->rumah_id)->harga_kredit20;
            }
            $attr['uang_muka'] = Rumah::find($req->rumah_id)->uang_muka_kredit;
        }

        Penjualan::find($id)->update($attr);
        toastr()->success('Berhasil diupdate');
        return redirect('/superadmin/penjualan');
    }
    public function penjualandelete($id)
    {
        Penjualan::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    public function laporan()
    {
        return view('superadmin.laporan.index');
    }

    public function rumahpdf()
    {
        $data = Rumah::get();
        $pdf = PDF::loadView('superadmin.laporan.pdf_rumah', compact('data'))->setPaper('legal');
        return $pdf->stream();
    }

    public function pembelipdf()
    {
        $data = Pembeli::get();
        $pdf = PDF::loadView('superadmin.laporan.pdf_pembeli', compact('data'))->setPaper('legal');
        return $pdf->stream();
    }

    public function karyawanpdf()
    {
        $data = Karyawan::get();
        $pdf = PDF::loadView('superadmin.laporan.pdf_karyawan', compact('data'))->setPaper('legal');
        return $pdf->stream();
    }

    public function bookingpdf()
    {
        $data = Booking::get();
        $pdf = PDF::loadView('superadmin.laporan.pdf_booking', compact('data'))->setPaper('legal');
        return $pdf->stream();
    }

    public function penjualanpdf()
    {
        $data = Penjualan::get();
        $pdf = PDF::loadView('superadmin.laporan.pdf_penjualan', compact('data'))->setPaper('legal');
        return $pdf->stream();
    }
}
