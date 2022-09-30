function terbilang(angka){

    var bilne=["","Satu","Dua","Tiga","Empat","Lima","Enam","Tujuh","Delapan","Sembilan","Sepuluh","Sebelas"];

    if(angka < 12){

        return bilne[angka];

    }else if(angka < 20){

        return terbilang(angka-10)+" Belas";

    }else if(angka < 100){

        return terbilang(Math.floor(parseInt(angka)/10))+" Puluh "+terbilang(parseInt(angka)%10);

    }else if(angka < 200){

        return "Seratus "+terbilang(parseInt(angka)-100);

    }else if(angka < 1000){

        return terbilang(Math.floor(parseInt(angka)/100))+" Ratus "+terbilang(parseInt(angka)%100);

    }else if(angka < 2000){

        return "Seribu "+terbilang(parseInt(angka)-1000);

    }else if(angka < 1000000){

        return terbilang(Math.floor(parseInt(angka)/1000))+" Ribu "+terbilang(parseInt(angka)%1000);

    }else if(angka < 1000000000){

        return terbilang(Math.floor(parseInt(angka)/1000000))+" Juta "+terbilang(parseInt(angka)%1000000);

    }else if(angka < 1000000000000){

        return terbilang(Math.floor(parseInt(angka)/1000000000))+" Milyar "+terbilang(parseInt(angka)%1000000000);

    }else if(angka < 1000000000000000){

        return terbilang(Math.floor(parseInt(angka)/1000000000000))+" Trilyun "+terbilang(parseInt(angka)%1000000000000);

    }

}
