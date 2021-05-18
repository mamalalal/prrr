using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace SibeniceMO
{
    public partial class Form1 : Form
    {
        List<string> slova = new List<string>();
        string vybraneSlovo;
        bool vybrano = false;
        List<string> pismena = new List<string>();
        List<Label> labely = new List<Label>();
        int vyhra;
        string pismeno;

        bool boolVedle = false;
        bool alesponJendo = false;

        int vedle;

        public Form1()
        {
            InitializeComponent();
            labely.Add(label1);
            labely.Add(label2);
            labely.Add(label3);
            labely.Add(label4);
            labely.Add(label5);
            labely.Add(label6);
            labely.Add(label7);
            labely.Add(label8);
            labely.Add(label9);
            labely.Add(label10);
            labely.Add(label11);
            
            Precist();
            VybratSlovo();

           


        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void button17_Click(object sender, EventArgs e)
        {
            alesponJendo = false;
            pismeno = button17.Text;
            button17.Enabled = false;
            for (int i = 0; i < pismena.Count(); i++)
            {
                if (pismena[i].Contains("Ť"))
                {
                    labely[i].Text = "Ť";
                    vyhra++;


                }
                else
                {
                    boolVedle = true;
                }
            }

            Stisknout();
            Vedle();
            Vyhra();
        }

        public void Precist()
        {

            foreach (string line in File.ReadLines(Directory.GetCurrentDirectory() + "\\Slova.txt"))
            {
                string[] columns = line.Split(',');
                for (int c = 0; c < columns.Length; c++)
                {
                    slova.Add(columns[c]);
                }
            }

           
            
        }

        public void VybratSlovo()
        {
            Random r = new Random();
            string slovo; 

            while(vybrano == false)
            {
                int random = r.Next(0, slova.Count() - 1);
                slovo = slova[random];
              
                if (Nastaveni.obtiznost == "snadna")
                {
                    
                    if (slovo.Length <5)
                    {
                       
                        vybraneSlovo = slovo;
                        vybrano = true;
                        pismena.Clear();
                        
                        foreach (char c in vybraneSlovo)
                        {
                            
                            pismena.Add(c.ToString());
                        }

                        

                        for (int i = 0; i < pismena.Count(); i++)
                        {

                            
                            labely[i].Text = "_";
                            labely[i].Visible = true;

                        }
                       



                    }

                }

                if (Nastaveni.obtiznost == "stredni")
                {
                    if (slovo.Length > 4 && slovo.Length < 8)
                    {
                        vybraneSlovo = slovo;
                        vybrano = true;
                        pismena.Clear();
                        foreach (char c in vybraneSlovo)
                        {

                            pismena.Add(c.ToString());
                        }

                        for (int i = 0; i < pismena.Count(); i++)
                        {

                            labely[i].Text = "_";
                            labely[i].Visible = true;

                        }


                    }

                }

                if (Nastaveni.obtiznost == "tezka")
                {
                    if (slovo.Length > 7)
                    {
                        vybraneSlovo = slovo;
                        vybrano = true;
                        pismena.Clear();
                        foreach (char c in vybraneSlovo)
                        {

                            pismena.Add(c.ToString());
                        }

                        for (int i = 0; i < pismena.Count(); i++)
                        {

                            labely[i].Text = "_";
                            labely[i].Visible = true;


                        }


                    }

                }

            }

            
            
            
        }

        public void Hlava()
        {
            Graphics g = panel1.CreateGraphics();

            Pen blackPen = new Pen(Color.Black, 3);
            
            g.DrawEllipse(blackPen, 85, 20, 30, 30);
           
        }
        public void Telo()
        {
            Graphics g = panel1.CreateGraphics();

            Pen blackPen = new Pen(Color.Black, 3);

            g.DrawLine(blackPen,100,110,100,50);

        }

        public void LevaRuka()
        {
            Graphics g = panel1.CreateGraphics();

            Pen blackPen = new Pen(Color.Black, 3);

            g.DrawLine(blackPen, 100, 60, 60, 80);
        }

        public void PravaRuka()
        {
            Graphics g = panel1.CreateGraphics();

            Pen blackPen = new Pen(Color.Black, 3);

            g.DrawLine(blackPen, 100, 60, 140, 80);
        }

        public void LevaNoha()
        {
            Graphics g = panel1.CreateGraphics();

            Pen blackPen = new Pen(Color.Black, 3);

            g.DrawLine(blackPen, 100, 105, 80, 150);
        }

        public void PravaNoha()
        {
            Graphics g = panel1.CreateGraphics();

            Pen blackPen = new Pen(Color.Black, 3);

            g.DrawLine(blackPen, 100, 105, 120, 150);

        }

        public void Vyhra()
        {
            if (vyhra == pismena.Count())
            {
                Konec.vyhral = "Vyhrál jsi ";
                Konec k = new Konec();
                k.Show();
                ((Form1)this.TopLevelControl).Hide();
            }

        }

        public void Vedle()
        {
            if (boolVedle == true)
            {
                vedle++;
                if (vedle == 1)
                {
                    Hlava();
                }
                else if (vedle == 2)
                {
                    Telo();
                }
                else if (vedle == 3)
                {
                    LevaRuka();
                }
                else if (vedle == 4)
                {
                    PravaRuka();
                }
                else if (vedle == 5)
                {
                    LevaNoha();
                }
                else if (vedle == 6)
                {
                    PravaNoha();
                    Konec.vyhral = "Prohrál jsi";
                    Konec k = new Konec();
                    k.Show();
                    ((Form)this.TopLevelControl).Hide();
                }
            }

            boolVedle = false;
        }


        public void Stisknout()
        {
            
            for (int i = 0; i < pismena.Count(); i++)
            {
                if (pismena[i].Contains(pismeno))
                {
                    
                    labely[i].Text = pismeno;
                    vyhra++;
                    alesponJendo = true;
                    
                }

                
            }

            if (alesponJendo == false)
            {
                
                boolVedle = true;

            }


        }


        private void panel1_Paint(object sender, PaintEventArgs e)
        {


            Pen blackPen = new Pen(Color.Black, 3);

            Point point1 = new Point(0, 0);
            Point point2 = new Point(0, panel1.Height);

            Point point3 = new Point(panel1.Width, panel1.Height-3);
            Point point4 = new Point(0, panel1.Height-3);

            Point point5 = new Point(100, 0);
            Point point6 = new Point(0, 0);

            Point point7 = new Point(100, 0);
            Point point8 = new Point(100, 20);


            e.Graphics.DrawLine(blackPen, point1, point2);
            e.Graphics.DrawLine(blackPen, point3, point4);
            e.Graphics.DrawLine(blackPen, point5, point6);
            e.Graphics.DrawLine(blackPen, point7, point8);

            
            
        }

        private void button1_Click(object sender, EventArgs e)
        {//A
            alesponJendo = false;
            pismeno = button1.Text;
            button1.Enabled = false;
            Stisknout();

            for (int i = 0; i < pismena.Count(); i++)
            {
                if (pismena[i].Contains("Á"))
                {
                    labely[i].Text = "Á";
                    vyhra++;
                    alesponJendo = true;
                    
                    boolVedle = false;

                }
                else if(alesponJendo == false)
                {
                    
                    boolVedle = true;

                }
            }
            Vyhra();
            Vedle();
            

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void label5_Click(object sender, EventArgs e)
        {

        }

        private void label11_Click(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {//B
            alesponJendo = false;
            pismeno = button2.Text;
            button2.Enabled = false;
            Stisknout();
            Vyhra();
            Vedle();
        }

        private void button3_Click(object sender, EventArgs e)
        {//C
            alesponJendo = false;
            pismeno = button3.Text;
            button3.Enabled = false;
            Stisknout();
            Vyhra();
            Vedle();
        }

        private void button4_Click(object sender, EventArgs e)
        {//D
            alesponJendo = false;
            pismeno = button4.Text;
            button4.Enabled = false;
            Stisknout();
            Vyhra();
            Vedle();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            //E
            alesponJendo = false;
            pismeno = button5.Text;
            button5.Enabled = false;
            Stisknout();
            



            for (int i = 0; i < pismena.Count(); i++)
            {
                if (pismena[i].Contains("É"))
                {
                    labely[i].Text = "É";
                    vyhra++;
                    alesponJendo = true;
                    boolVedle = false;

                }
                else if(alesponJendo == false)
                {
                    boolVedle = true;

                }

                if (pismena[i].Contains("Ě"))
                {
                    labely[i].Text = "Ě";
                    vyhra++;
                    alesponJendo = true;
                    boolVedle = false;

                }
                else if(alesponJendo == false)
                {
                    boolVedle = true;
                }

            }
            Vedle();
            Vyhra();
        }

        private void button6_Click(object sender, EventArgs e)
        {
            //F
            alesponJendo = false;
            pismeno = button6.Text;
            button6.Enabled = false;
            Stisknout();
            Vyhra();
            Vedle();

        }

        private void button24_Click(object sender, EventArgs e)
        {
            //G
            alesponJendo = false;
            pismeno = button24.Text;
            button24.Enabled = false;
            Stisknout();
            Vyhra();
            Vedle();
        }

        private void button23_Click(object sender, EventArgs e)
        {
            //H
            alesponJendo = false;
            pismeno = button23.Text;
            button23.Enabled = false;
            Stisknout();
            Vyhra();
            Vedle();
        }

        private void button22_Click(object sender, EventArgs e)
        {
            //CH
            alesponJendo = false;
            pismeno = button22.Text;
            button22.Enabled = false;
            Stisknout();
            Vyhra();
            Vedle();
        }

        private void button21_Click(object sender, EventArgs e)
        {
            //I
            alesponJendo = false;
            pismeno = button21.Text;
            button21.Enabled = false;
            Stisknout();
            for (int i = 0; i < pismena.Count(); i++)
            {
                if (pismena[i].Contains("Í"))
                {
                    labely[i].Text = "Í";
                    vyhra++;
                    alesponJendo = true;
                    boolVedle = false;

                }
                else if (alesponJendo == false)
                {
                    boolVedle = true;
                }
            }

               
            Vedle();
            Vyhra();
        }

        private void button20_Click(object sender, EventArgs e)
        {
            //J
            alesponJendo = false;
            pismeno = button20.Text;
            button20.Enabled = false;
            Stisknout();
            Vyhra();
            Vedle();
        }

        private void button19_Click(object sender, EventArgs e)
        {
            //K
            alesponJendo = false;
            pismeno = button19.Text;
            button19.Enabled = false;
            Stisknout();
            Vyhra();
            Vedle();
        }

        private void button25_Click(object sender, EventArgs e)
        {
            //L
            alesponJendo = false;
            pismeno = button25.Text;
            button25.Enabled = false;
            Stisknout();
            Vyhra();
            Vedle();
        }

        private void button12_Click(object sender, EventArgs e)
        {
            //M
            alesponJendo = false;
            pismeno = button12.Text;
            button12.Enabled = false;
            Stisknout();
            Vyhra();
            Vedle();
        }

        private void button11_Click(object sender, EventArgs e)
        {
            //N
            alesponJendo = false;
            pismeno = button11.Text;
            button11.Enabled = false;
            Stisknout();
            Vyhra();
            Vedle();
        }

        private void button10_Click(object sender, EventArgs e)
        {
            //O
            alesponJendo = false;
            pismeno = button10.Text;
            button10.Enabled = false;
            
            Stisknout();
            Vyhra();
            
            Vedle();
        }

        private void button9_Click(object sender, EventArgs e)
        {//P
            alesponJendo = false;
            pismeno = button9.Text;
            button9.Enabled = false;

            Stisknout();
            Vyhra();

            Vedle();
        }

        private void button8_Click(object sender, EventArgs e)
        {//Q

            alesponJendo = false;
            pismeno = button8.Text;
            button8.Enabled = false;

            Stisknout();
            Vyhra();

            Vedle();
        }

        private void button7_Click(object sender, EventArgs e)
        {//R
            alesponJendo = false;
            pismeno = button7.Text;
            button7.Enabled = false;
            Stisknout();
            for (int i = 0; i < pismena.Count(); i++)
            {
                if (pismena[i].Contains("Ř"))
                {
                    labely[i].Text = "Ř";
                    vyhra++;
                    alesponJendo = true;
                    boolVedle = false;

                }
                else if (alesponJendo == false)
                {
                    boolVedle = true;
                }
            }

            
            Vedle();
            Vyhra();
        }

        private void button18_Click(object sender, EventArgs e)
        {//S
            alesponJendo = false;
            pismeno = button18.Text;
            button18.Enabled = false;
            Stisknout();
            for (int i = 0; i < pismena.Count(); i++)
            {
                if (pismena[i].Contains("Š"))
                {
                    labely[i].Text = "Š";
                    vyhra++;
                    alesponJendo = true;
                    boolVedle = false;

                }
                else if (alesponJendo == false)
                {
                    boolVedle = true;
                }
            }

            
            Vedle();
            Vyhra();
        }

        private void button16_Click(object sender, EventArgs e)
        {
            alesponJendo = false;
            pismeno = button16.Text;
            button16.Enabled = false;

            Stisknout();
            Vyhra();

            Vedle();
        }

        private void button15_Click(object sender, EventArgs e)
        {
            alesponJendo = false;
            pismeno = button15.Text;
            button15.Enabled = false;

            Stisknout();
            Vyhra();

            Vedle();
        }

        private void button14_Click(object sender, EventArgs e)
        {
            alesponJendo = false;
            pismeno = button14.Text;
            button14.Enabled = false;

            Stisknout();
            Vyhra();

            Vedle();
        }

        private void button13_Click(object sender, EventArgs e)
        {
            alesponJendo = false;
            pismeno = button13.Text;
            button13.Enabled = false;

            Stisknout();
            Vyhra();

            Vedle();
        }

        private void button26_Click(object sender, EventArgs e)
        {//Y
            alesponJendo = false;
            pismeno = button26.Text;
            button26.Enabled = false;
            Stisknout();
            for (int i = 0; i < pismena.Count(); i++)
            {
                if (pismena[i].Contains("Ý"))
                {
                    labely[i].Text = "Ý";
                    vyhra++;
                    alesponJendo = true;
                    boolVedle = false;

                }
                else if (alesponJendo == false)
                {
                    boolVedle = true;
                }
            }
            Vedle();
            Vyhra();
        }

        private void button27_Click(object sender, EventArgs e)
        {
            alesponJendo = false;
            pismeno = button27.Text;
            button27.Enabled = false;
            Stisknout();
            for (int i = 0; i < pismena.Count(); i++)
            {
                if (pismena[i].Contains("Ž"))
                {
                    labely[i].Text = "Ž";
                    vyhra++;
                    alesponJendo = true;
                    boolVedle = false;

                }
                else if (alesponJendo == false)
                {
                    boolVedle = true;
                }
            }

            
            Vedle();
            Vyhra();
        }
    }
}
