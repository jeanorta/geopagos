<?php 
	public abstract class FiguraGeometrica {
		protected double valor1;
		public FiguraGeometrica(double valor1) {
		 this.valor1 = valor1;
		}
		public double getValor1() {
		 return valor1;
		}
		public void setValor1(double valor1) {
		 this.valor1 = valor1;
		}
		public abstract double getArea();
		public abstract double getPerimetro();
		public abstract double getAltura();
	}


	public class Cuadrado extends FiguraGeometrica {
		public tipo = 'cuadrado';
		public Cuadrado(double valor1) {
		 super(valor1);
		}

		public double getArea() {
		 return Math.pow(this.valor1, 2);
		}

		public double getPerimetro() {
		 return this.valor1*4;
		}

		public double getAltura() {
		 return valor1;
		}
	}

	public class Triangulo extends FiguraGeometrica {
		private double valor2;
		public tipo = 'triangulo';
		 
		public Triangulo(double valor1, double valor2) {
		 super(valor1);
		 this.valor2 = valor2;
		}

		public double getValor2() {
		 return valor2;
		}
		public void setValor2(double valor2) {
	  	 this.valor2 = valor2;
		}

		public double getArea() {
		 return (this.valor1*this.valor2)/2;
		}

		public double getPerimetro() {
		 return this.valor1 + (2 * Math.sqrt((Math.pow(this.valor1, 2)+Math.pow(this.valor2, 2))));
		}

		public double getAltura() {
		 return (this.valor1*this.valor2)/2;
		}
	}

	public class Circulo extends FiguraGeometrica {
		public tipo = 'circulo';
		public Circulo(double valor1) {
		 super(valor1);
		}

		public double getArea() {
		 return Math.PI*Math.pow(this.valor1, 2);
		}

		public double getPerimetro() {
		 return Math.PI*this.valor1;
		}

		public double getAltura() {
		 return valor1 *2;
		}
	}

 ?>