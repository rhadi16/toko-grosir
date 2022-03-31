var tw = new Date();
if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
else (a=tw.getTime());
tw.setTime(a);
var tahun= tw.getFullYear ();
var hari= tw.getDay ();
var bulan= tw.getMonth ();
var tanggal= tw.getDate ();
var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun;

const desc_in = $('.desc-in').data('flashdata');
if (desc_in == "success-send") {
    Swal.fire(
      'Berhasil Mengirim Email!',
      'Silahkan Cek Email Anda Untuk Melihat Balasan Dari Admin',
      'success'
    )
} else if (desc_in == "success-reg") {
    Swal.fire(
      'Berhasil Melakukan Registrasi!',
      'Silahkan Login Sebagai Pelanggan',
      'success'
    )
}

$(document).ready(function(){
    $('.sidenav').sidenav();

    $('.modal').modal();

    $('.tooltipped').tooltip();

    $('select').formSelect();

    $('.swal2-popup').find('div[class$="select-wrapper"]').remove();
});