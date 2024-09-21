<?php
{
    class PasswordAnalyzer
    {
        private $numeros;
        private $mayusculas;
        private $longitudMinima;

        public function __construct($numeros = 2, $mayusculas = 2, $longitudMinima = 8)
        {
            $this->setNumeros($numeros);
            $this->setMayusculas($mayusculas);
            $this->setLongitudMinima($longitudMinima);
        }

        public function getNumeros()
        {
            return $this->numeros;
        }

        public function getMayusculas()
        {
            return $this->mayusculas;
        }

        public function getLongitudMinima()
        {
            return $this->longitudMinima;
        }

        public function setNumeros($numeros)
        {
            if (is_int($numeros) && $numeros >= 0)
            {
                $this->numeros = $numeros;
            }
        }

        public function setMayusculas($mayusculas)
        {
            if (is_int($mayusculas) && $mayusculas >= 0)
            {
                $this->mayusculas = $mayusculas;
            }
        }

        public function setLongitudMinima($longitudMinima)
        {
            if (is_int($longitudMinima) && $longitudMinima >= 0)
            {
                $this->longitudMinima = $longitudMinima;
            }
        }

        public function esClaveFuerte($clave)
        {
            if (strlen($clave) < $this->longitudMinima)
            {
                return false;
            }
            $contarNumeros = preg_match_all('/\d/', $clave);
            $contarMayusculas = preg_match_all('/[A-Z]/', $clave);
            $condición1=$contarNumeros >= $this->numeros;
            $condicion2=$contarMayusculas >= $this->mayusculas;
            return $condición1 && $condicion2;
        }

        public function generarClave() 
        {
            $clave = '';
            $caracteres = 'abcdefghijklmnopqrstuvwxyz' . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' . '0123456789' . '!@#$%^&*()_+';
            
            while (strlen($clave) < $this->longitudMinima)
            {
                $clave = $clave . $caracteres[rand(0, strlen($caracteres) - 1)];
            }
            return $clave;
        }
    }
    
    function analizarClaves($archivo)
    {
        $clavesDebiles1 = [];
        $clavesDebiles2 = [];
        
        $analizador1 = new PasswordAnalyzer(3, 1, 6);        
        $analizador2 = new PasswordAnalyzer(4, 3, 12);
        
        $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lineas as $clave)
        {
            if ($analizador1->esClaveFuerte($clave) === false)
            {
                $clavesDebiles1[] = $clave;
            }
            if ($analizador2->esClaveFuerte($clave) === false)
            {
                $clavesDebiles2[] = $clave;
            }
        }

        return [
            'clavesDebiles1' => $clavesDebiles1,
            'clavesDebiles2' => $clavesDebiles2,
        ];
    }
    
    $resultado = analizarClaves('claves.txt');
    print_r($resultado);

}