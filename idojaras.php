<?php 

    class Idojaras {
        private $id;
        private $datum;
        private $hofok;
        private $leiras;

        public function __construct(DateTime $datum, int $hofok, string $leiras) {
            $this -> datum = $datum;
            $this -> hofok = $hofok;
            $this -> leiras = $leiras;
        }

        public function getId() : ?int {
            return $this -> id;
        }

        public function getDatum() : DateTime {
            return $this -> datum;
        }

        public function getHofok() : int {
            return $this -> hofok;
        }

        public function getLeiras() : string {
            return $this -> leiras;
        }
        
        
        public static function osszes() : array {
            global $db;
            
            $t = $db -> query("SELECT * FROM adatok ORDER BY datum ASC")
                -> fetchAll();
                $eredmeny = [];
                
                foreach ($t as $elem) {
                    $idojarasAdatok = new Idojaras(new DateTime($elem['datum']), $elem['hofok'], $elem['leiras']);
                    $idojarasAdatok -> id = $elem['id'];
                $eredmeny[] = $idojarasAdatok;
            }
            
            return $eredmeny;
        }
        
        public static function idojarasUpdate(int $hofok, string $leiras, int $idojarasId) {
           global $db;

           $db -> prepare('UPDATE adatok SET hofok = :homerseklet, leiras = :leiras WHERE id = :id')
                -> execute([':homerseklet' => $hofok, ':leiras' => $leiras, ':id' => $idojarasId]);
        }
    }

?>