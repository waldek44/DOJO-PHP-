<?php

/////////////////////////////////////////////////////////////////////////////////////
// 
echo "</br></br></br><h1>1 DEFINIOWANIE KLASY</h1>";
//


class User {
    //właściwości (zmienne klasowe)
    // właściwości public to takie do których możemy się odwołać z poza klasy
    // właściwości private to takie do których możemy się odwołać tylko wewnątrz klasy
    // właściwości protected to takie do których mamy dostęp tylko wewnątrz klasy (i w klasach dziedziczących)
    public $id;
    public $name;
    public $email;
    public $password;

    // metoda to funkcja wewnątrz klasy, można je wywoływać tylko na obiektach klasy
    // this - pseudozmienna używana by w kontekście obiektu odwołać się do jego właściwości
    public function ShowUserInfo() {
        echo $this->id . '</br>';
        echo $this->name . '</br>';
        echo $this->email . '</br>';
        echo $this->password . '</br>';    
    }

    // metoda która przyjmuje argument
    public function ChangePassword($newPassword) {
        // za pomocą this odwołuję się do bieżącej wartości hasła
        $this->password = $newPassword;
    }

}

// towrzę obiekt klasy User za pomocą konstruktora (User)
$Waldek = new User();

// odwołuję się do właściwości i przypisuję jej wartość (można to zrobić tylko za pośrenictwem obiektu)
echo  '</br>' . '</br>' . 'odwołuję się do właściwości i przypisuję jej wartośći' . '</br>';
$Waldek -> id = 44;
$Waldek -> name = 'Waldemar';
$Waldek -> email = 'waldek@ja.pl';
$Waldek -> password = "tajne";

echo  '</br>' . '</br>' . 'wyświetlam info o obiekcie odwołując się do właściwości' . '</br>';
echo $Waldek->id . '</br>';
echo $Waldek->name . '</br>';
echo $Waldek->email . '</br>';
echo $Waldek->password . '</br>';

echo  '</br>' . '</br>' . 'wyświetlam info o obiekcie odwołując się do właściwości za pomocą metody ShowUserInfo' . '</br>';
// wywołuję metodę na obiekcie
$Waldek->ShowUserInfo();

// korzystam z metody zmiany hasła ChangePassword
echo  '</br>' . '</br>' . 'wyświetlam info o obiekcie po skorzystaniu z metody zmiany hasła ChangePassword' . '</br>';
$Waldek->ChangePassword('123456789');
$Waldek->ShowUserInfo();


/////////////////////////////////////////////////////////////////////////////////////
// 
echo "</br></br></br><h1>2 DEFINIOWANIE KONSTRUKTORA</h1>";
// konstruktor to specjalna metoda klasowa która jest automatycznie wywoływana gdy tworzymy nowy obiekt
//

class User2 {
    public $id;
    public $name;
    public $email;
    public $password;

    // definiuję konstruktor
    public function __construct($id, $name, $email, $password ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function ShowUser2Info() {
        echo $this->id . '</br>';
        echo $this->name . '</br>';
        echo $this->email . '</br>';
        echo $this->password . '</br>';    
    }

}

$Anna = new User2('23', 'Ania', 'ania@tomalpa.pl', 'Waldek');
echo  '</br>' . '</br>' . 'wyświetlam info o obiekcie User2' . '</br>';
$Anna->ShowUser2Info();


/////////////////////////////////////////////////////////////////////////////////////
// 
echo "</br></br></br><h1>3 DZIEDZICZENIE</h1>";
// Dziedziczenie dotyczy również klas - mogę stworzyć nadrzędną i podrzędną (która będzie dziedziczyła właściwości, metody, itp.)
//

// klasa Admin dziedziczy z klasy User
class Admin extends User2 {
    public $privileges;
    public function setPrivileges($privileges) {
        $this->privileges = $privileges;
    }

    // tworzę własną implementację metody z klasy rodzica
    // aby nie nadpisać tamtej metody a uzupełnić o nową funkcjonalność muszę użyć słowa kluczowego Parent
    //parent::odwołanie-do-metody-którą-dziedziczę
    public function ShowUser2Info() {
        parent::ShowUser2Info();
        echo $this->privileges; 
    }
}

$waldekAdmin = new Admin(21, 'Waldek', 'w@w.pl', 'erefcdrh5edfvds');
echo  '</br>' . '</br>' . 'wyświetlam info o obiekcie Admin' . '</br>';

$waldekAdmin->setPrivileges('brak uprawnień');
$waldekAdmin->ShowUser2Info();

?>