<?
class Complex {

	protected	$real,
				$imag;

	public function __construct($real = NULL, $imag = NULL) {
		$this->real = isset($real) ? (float) $real : 0;
		$this->imag = isset($imag) ? (float) $imag : 0;
	}

	public function __toString() {
		return sprintf('complex(%s%si*%s)', $this->real, $this->imag < 0 ? '-' : '+', abs($this->imag));
	}

	public function add(self $y) {
		$result = new self;
		$result->real = $this->real + $y->real;
		$result->imag = $this->imag + $y->imag;
		return $result;
	}

	public function sub(self $y) {
		$result = new self;
		$result->real = $this->real - $y->real;
		$result->imag = $this->imag - $y->imag;
		return $result;
	}

	public function mul(self $y) {
		$result = new self;
		$result->real = $this->real * $y->real - $this->imag * $y->imag;
		$result->imag = $this->imag * $y->real + $this->real * $y->imag;
		return $result;
	}

	public function div(self $y) {
		$result = new self;
		$tmp = $this->real * $this->real + $this->imag * $this->imag;
		if ($tmp == 0.0) {
			return 'На ноль делить нельзя';
		}
		$result->real = ($this->real * $y->real + $this->imag * $y->imag) / $tmp;
		$result->imag = ($this->real * $y->imag - $this->imag * $y->real) / $tmp;
		return $result;
	}

}



// Два случайных комплексных числа
$complex1 = new Complex(mt_rand(-1000, 1000), mt_rand(-1000, 1000));
$complex2 = new Complex(mt_rand(-1000, 1000), mt_rand(-1000, 1000));

// Сложение
$complex = $complex1->add($complex2);
printf("%s + %s = %s;<br>", $complex1, $complex2, $complex);


// Вычитание
$complex = $complex1->sub($complex2);
printf("%s - %s = %s;<br>", $complex1, $complex2, $complex);

// Умножение
$complex = $complex1->mul($complex2);
printf("%s * %s = %s;<br>", $complex1, $complex2, $complex);

// Деление
$complex = $complex1->div($complex2);
printf("%s / %s = %s;<br>", $complex1, $complex2, $complex);