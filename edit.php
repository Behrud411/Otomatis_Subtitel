<?php
system('clear');
error_reporting(0);
$res="\033[7m";
$hitam="\033[0;30m";
$abu2="\033[1;30m";
$putih="\033[0;37m";
$putih2="\033[1;37m";
$red="\033[0;31m";
$red2="\033[1;31m";
$green="\033[0;32m";
$green2="\033[1;32m";
$yellow="\033[0;33m";
$yellow2="\033[1;33m";
$blue="\033[0;34m";
$blue2="\033[1;34m";
$purple="\033[0;35m";
$purple2="\033[1;35m";
$lblue="\033[0;36m";
$lblue2="\033[1;36m";

echo "\n";
echo"{$lblue2}^   ▒▀▀█▀▀  ▒█  ▒█  ▒▀▀█▀▀█  ▒█▀▀█  ▒▀█▀▒     {$lblue2}^\n";
echo"{$lblue2}^     ▒█    ▒█  ▒█    ▒█  █  ▒█  █    █       {$lblue2}^\n";
sleep(1);
echo"{$lblue2}^   {$putih2}  ▒█    ▒█  ▒█    ▒█▄▄█  ▒█▄▄█    █       {$lblue2}^\n";
echo"{$lblue2}^   {$putih2}  ▒█    ▒█▄▄▒█    ▒█     ▒█ ▒█  ▒▄█▄▒     {$lblue2}^\n";
sleep(1);
echo"{$blue2}▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄\n";
echo "{$blue2}█{$lblue2}Creator: {$putih2}Tupai{$blue2}       █{$lblue2}YT: {$putih2}Penghasil Gratisan{$blue2} █\n";
echo "{$blue2}█{$lblue2}HOBI   : {$putih2}Nyopet{$blue2}      █{$yellow}       Warning!!!      {$blue2}█\n";
sleep(1);
echo "{$blue2}█{$lblue2}Tanggal: {$putih2}";
echo date("d-M-Y"); 
echo " {$blue2}█{$yellow}  This script is free{$blue2}  █\n";
echo "{$blue2}█▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄█▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄█\n";
echo "{$blue2}█▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄█▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄█\n";



echo "{$putih2}[{$yellow2}1{$putih2}].{$green2}POTONG VIDIO
{$putih2}[{$yellow2}2{$putih2}].{$green2}CONVERT VIDIO TO WAV/MP3\n\n";

echo "{$putih2}INPUT NUMBER: ";
$input = trim(fgets(STDIN));

if($input == 1){

echo "{$green2}Input nama file: {$yellow2}";
$vd = trim(fgets(STDIN));
echo "{$green2}Beri nama hasil: {$yellow2}";
$hsl = trim(fgets(STDIN));
echo "{$green2}potong vidio dari: {$yellow2}";
$dr = trim(fgets(STDIN));
echo "{$green2}sampai ke: {$yellow2}";
$hg = trim(fgets(STDIN));


$video = "$vd";
$hasil = "$hsl";
$dari = "$dr";
$hingga = "$hg";

//Potong Vidio Dari menit berapa hingga Menit Berapa

$potong_mp4 = shell_exec("ffmpeg -i $video -ss $dari -to $hingga -async 1 -c copy $hasil");
echo $potong_mp4;
exec("termux-open $hasil");
}

if($input == 2){
//Merubah File MP4 menjadi wav/mp3
echo "{$green2}Input nama file: {$yellow2}";
$vd = trim(fgets(STDIN));
echo "{$green2}Beri nama hasil Cnth mp3.wav/cuk.mp3: {$yellow2}";
$hsl = trim(fgets(STDIN));
echo "{$green2}WAV/MP3: {$yellow2}";
$tipe = trim(fgets(STDIN));

$cv = shell_exec("ffmpeg -i $vd -ac 2 -f $tipe $hsl");
}

