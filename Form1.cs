using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace KalkulackaMO
{
   
    public partial class Form1 : Form
    {



        
        string operace = "";
        List<double> Cisla = new List<double>();
        List<double> ProzatimniCisla = new List<double>();
        List<string> Operanty = new List<string>();
        List<string> CE = new List<string>();
        double tempVysledek = 0;
        double cislo1;
        double cislo2;
        string operaceCisel = "";
        int vysledek;

        public Form1()
        {
            InitializeComponent();
        }
        //TODO: ošetřit vyjimky 

        private void button10_Click(object sender, EventArgs e)
        {
           
        }

        private void button7_Click(object sender, EventArgs e)
        {
        }

        private void button8_Click(object sender, EventArgs e)
        {
           
          
        }

        private void button9_Click(object sender, EventArgs e)
        {
        }

        private void button4_Click(object sender, EventArgs e)
        {
            
        }

        private void button5_Click(object sender, EventArgs e)
        {

        }

        private void button6_Click(object sender, EventArgs e)
        {
            
        }

        private void button1_Click(object sender, EventArgs e)
        {
            
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            
        }

        private void button3_Click(object sender, EventArgs e)
        {
            
        }

        private void button11_Click(object sender, EventArgs e)
        {
            richTextBox1.Text = "";
            Operanty.Clear();
            Cisla.Clear();
            ProzatimniCisla.Clear();
            tempVysledek = 0;
        }

        private void button16_Click(object sender, EventArgs e)
        {
            

        }

        

        private void button14_Click(object sender, EventArgs e)
        {

        }

        private void Numbers(object sender, EventArgs e)
        {
            Button b = (Button)sender;

            if (richTextBox1.Text == "0")
            {
                richTextBox1.Text = "";
            }

            if (!richTextBox1.Text.Contains("."))
            {
                richTextBox1.Text = richTextBox1.Text + b.Text;
            }
            else
            {
                richTextBox1.Text = richTextBox1.Text + b.Text;
            }

            
            

            
        }

        private void Operatory(object sender, EventArgs e)
        {

            string s = richTextBox1.Text;
            double doubly = 0;
            char[] operanty = { '+', '*', '/', '-' };
            string[] cisla = s.Split(operanty);
            string cislastring = "";

            for (int i = 0; i < cisla.Length; i++)
            {
                cislastring = cisla[i];
                double.TryParse(cislastring, out doubly);
                ProzatimniCisla.Add(doubly);

            }
            Console.WriteLine(Operanty.Count());
            Console.WriteLine(ProzatimniCisla.Count());

            if (Operanty.Count() == ProzatimniCisla.Count() - 1)
            {
                Button b = (Button)sender;
                operace = b.Text;

                Operanty.Add(b.Text);
                richTextBox1.Text = richTextBox1.Text + operace;
                Console.WriteLine("asdasdsad");
                
            }
            else 
            {
                
            }

            ProzatimniCisla.Clear();
        }
        private void button13_Click(object sender, EventArgs e)
        {
            
            string s = richTextBox1.Text;
            double doubly = 0;
            char[] operanty = {'+','*','/' , '-'}; 
            string[] cisla = s.Split(operanty);
            string cislastring = "";

           

            for (int i = 0; i < cisla.Length; i++)
            {
                if (cisla[i] != "")
                {
                    cislastring = cisla[i];
                    double.TryParse(cislastring, out doubly);
                    ProzatimniCisla.Add(doubly);
                    Console.WriteLine(i + "asdfasddasdfdadsfasd");
                }
                
            }
            Console.WriteLine(Operanty.Count() + "operanty");
            Console.WriteLine(ProzatimniCisla.Count() + "prozatimni cisla");
            Console.WriteLine(ProzatimniCisla[0]);
           

            if (Operanty.Count() < ProzatimniCisla.Count())
            {
                for (int i = 0; i < cisla.Length; i++)
                {
                    cislastring = cisla[i];
                    doubly = Convert.ToDouble(cislastring);
                    Cisla.Add(doubly);

                }

                for (int i = 0; i < Operanty.Count(); i++)
                {
                    operace = Operanty[i];

                    if (i == 0)
                    {
                        cislo1 = Cisla[i];
                        cislo2 = Cisla[i + 1];

                        if (operace == "+")
                        {
                            tempVysledek = cislo1 + cislo2;
                        }
                        else if (operace == "*")
                        {
                            tempVysledek = cislo1 * cislo2;
                        }
                        else if (operace == "/")
                        {
                            tempVysledek = cislo1 / cislo2;
                        }
                        else if (operace == "-")
                        {
                            tempVysledek = cislo1 - cislo2;
                        }


                    }
                    else
                    {
                        Console.WriteLine(tempVysledek);
                        Console.WriteLine(cislo2);
                        cislo2 = Cisla[i + 1];
                        if (operace == "+")
                        {
                            tempVysledek = tempVysledek + cislo2;
                        }
                        else if (operace == "*")
                        {
                            tempVysledek = tempVysledek * cislo2;
                        }
                        else if (operace == "/")
                        {
                            tempVysledek = tempVysledek / cislo2;
                        }
                        else if (operace == "-")
                        {
                            tempVysledek = tempVysledek - cislo2;
                        }



                    }


                }
                Cisla.Clear();
                Operanty.Clear();
                richTextBox1.Text = tempVysledek.ToString();



            }
            else 
            { 
            
            }
            ProzatimniCisla.Clear();
          
        }

        private void button12_Click(object sender, EventArgs e)
        {
            
            string s = richTextBox1.Text;
   
            char[] operanty = { '+', '*', '/', '-' };
          
            string[] cisla = s.Split(operanty);
            
            cisla[cisla.Length - 1] = "";

            richTextBox1.Text = "";
            for (int i = 0; i < cisla.Length - 1; i++)
            {
               
                    richTextBox1.Text = richTextBox1.Text + cisla[i];
                    Console.WriteLine(cisla[i]);


                    richTextBox1.Text = richTextBox1.Text + Operanty[i];

                
            }
        }

        private void button24_Click(object sender, EventArgs e)
        {
            richTextBox1.Text = tempVysledek.ToString();
        }

        private void button23_Click(object sender, EventArgs e)
        {
            string lastString;
            lastString = richTextBox1.Text;

            if (richTextBox1.Text != "")
            {


                richTextBox1.Text = lastString.Remove(lastString.Length - 1);
            }
        }

        private void button21_Click(object sender, EventArgs e)
        {
            string s = richTextBox1.Text;
            char[] operanty = { '+', '*', '/', '-' };
            string[] cisla = s.Split(operanty);
            double doubly = 0;
            string cislastring = "";

            for (int i = cisla.Length; i < cisla.Length+1; i++)
            {
                
                cislastring = cisla[i - 1];
                doubly = Convert.ToDouble(cislastring);
                Console.WriteLine(doubly);
                Cisla.Add(doubly);

            }

            double cislo = Cisla[Cisla.Count() - 1];
            double cisloNaDruhou = cislo * cislo;

            richTextBox1.Text = "";
            
            for (int i = 0; i < cisla.Length - 1; i++)
            {
               
                    richTextBox1.Text = richTextBox1.Text + cisla[i];
                    Console.WriteLine(cisla[i]);


                    richTextBox1.Text = richTextBox1.Text + Operanty[i];
                 
                
            }
            richTextBox1.Text = richTextBox1.Text + cisloNaDruhou.ToString();
        }

        private void button20_Click(object sender, EventArgs e)
        {
            string s = richTextBox1.Text;
            char[] operanty = { '+', '*', '/', '-' };
            string[] cisla = s.Split(operanty);
            double doubly = 0;
            string cislastring = "";

            for (int i = cisla.Length; i < cisla.Length + 1; i++)
            {

                cislastring = cisla[i - 1];
                doubly = Convert.ToDouble(cislastring);
                Console.WriteLine(doubly);
                Cisla.Add(doubly);

            }

            double cislo = Cisla[Cisla.Count() - 1];
            double cisloNaDruhou = Math.Sqrt(cislo);

            richTextBox1.Text = "";

            for (int i = 0; i < cisla.Length - 1; i++)
            {

                richTextBox1.Text = richTextBox1.Text + cisla[i];
                Console.WriteLine(cisla[i]);


                richTextBox1.Text = richTextBox1.Text + Operanty[i];


            }
            richTextBox1.Text = richTextBox1.Text + cisloNaDruhou.ToString();
        }

        private void richTextBox1_TextChanged(object sender, EventArgs e)
        {
            
            

        }

        private void zavorky(object sender, EventArgs e)
        {
           
        }
    }
}
