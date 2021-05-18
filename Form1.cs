using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HadMO
{
    public partial class Form1 : Form
    {
        int width = 20;
        int height = 20;
        List<Circle> had = new List<Circle>();
        List<Circle> jidlohada = new List<Circle>();
        string smer = "doprava";
        public static int body = 0;
        bool jednou = true;
        public Form1()
        {
            
            InitializeComponent();
            Size = new Size(Nastaveni.velikostx + 200, Nastaveni.velikosty+60);
            label1.Location = new Point(Nastaveni.velikostx + 20,30);
            label2.Location = new Point(label1.Location.X+40,label1.Location.Y);
            label2.Text = body.ToString();

            pictureBox1.Width = Nastaveni.velikostx;
            pictureBox1.Height = Nastaveni.velikosty;
            Circle hlava = new Circle { X = (pictureBox1.Size.Width/2)/width , Y = (pictureBox1.Size.Height/2) / height};

            body = 0;

            had.Add(hlava);


            timer1.Interval = Nastaveni.rychlost;
            timer1.Start();
            timer1.Tick += UpdateScreen;


            Random r = new Random();
         
            int xjidla =  pictureBox1.Size.Width / width;
            int yjidla = pictureBox1.Size.Height / height;

            Circle jidlo = new Circle {X = r.Next(0, xjidla) , Y = r.Next(0,yjidla) };
            jidlohada.Add(jidlo);
            
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {

        }
       
        public void NoveJidlo()
        {
            Random r = new Random();
            int xjidla = pictureBox1.Size.Width / width;
            int yjidla = pictureBox1.Size.Height / height;
            jidlohada.Clear();
            int x;
            int y;
            bool dokdy = true;
            bool rovnaSe = false;
            int kolikSeRovna = 0;

            while (dokdy == true)
            {
                x = r.Next(0, xjidla);
                y = r.Next(0, yjidla);
                Console.WriteLine(x + "y" +y);
                for (int i = 0; i < had.Count; i++)
                {
                    if (had[i].X == x && had[i].Y == y)
                    {
                        rovnaSe = true;
                    }
                    else
                    {
                        kolikSeRovna++;
                    }

                    if (kolikSeRovna == had.Count())
                    {
                        rovnaSe = false;
                    }
                   
                        
                    
                }

                if (rovnaSe == false)
                {
                    dokdy = false;
                    Circle jidlo = new Circle { X = x, Y = y };
                    jidlohada.Add(jidlo);
                    rovnaSe = false;
                }
               
            }

           
            
        }

        public void UpdateScreen(object sender, EventArgs e )
        {

            
            
            for (int i = had.Count() - 1; i >= 0; i--)
            {
               

                if (i == 0)
                {


                    if (smer == "dolu")
                    {
                        had[i].Y = had[i].Y + 1;
                    }

                    if (smer == "doprava")
                    {
                        had[i].X = had[i].X + 1;
                    }

                    if (smer == "doleva")
                    {
                        had[i].X = had[i].X - 1;
                    }

                    if (smer == "nahoru")
                    {
                        had[i].Y = had[i].Y - 1;
                    }
                    
                    if (had[i].X > pictureBox1.Size.Width / width || had[i].X < 0 || had[i].Y > pictureBox1.Size.Height/height || had[i].Y < 0)
                    {
                        KonecHry();
                    }

                    for (int c = 1; c < had.Count; c++)
                    {
                        if (had[i].X == had[c].X && had[i].Y == had[c].Y)
                        {
                            KonecHry();
                        }
                    }


                    if (had[0].X == jidlohada[0].X && had[0].Y == jidlohada[0].Y)
                    {
                        Circle telo = new Circle
                        {
                            X = had[had.Count() - 1].X,
                            Y = had[had.Count - 1].Y
                        };
                        body++;
                        label2.Text = body.ToString();
                        had.Add(telo);
                        NoveJidlo();
                    }

                    


                }
                else
                {
                    had[i].X = had[i - 1].X;
                    had[i].Y = had[i - 1].Y;

                }

               


            }
            
            pictureBox1.Invalidate();
        }
        public void KonecHry()
        {
            if (jednou == true)
            {

               

                Konec k = new Konec();
                
                k.Show();

                ((Form)this.TopLevelControl).Hide();
                
                jednou = false;
                body = 0;
            }
        }


        private void pictureBox1_Paint(object sender, PaintEventArgs e)
        {
            Graphics canvas = e.Graphics;
            for (int i = 0; i < had.Count(); i++)
            {
                if (i == 0)
                {
                    Brush headColour;
                    headColour = Brushes.Red;
                    canvas.FillEllipse(headColour, new Rectangle(had[i].X * width, had[i].Y * height, width, height));
                }
                else
                {
                    Brush snakeColour;
                    snakeColour = Brushes.Black;
                    canvas.FillEllipse(snakeColour, new Rectangle(had[i].X * width , had[i].Y * height, width, height));
                }
                
                
            }

            for (int i = 0; i < jidlohada.Count(); i++)
            {
                Brush jidlocolor;
                jidlocolor = Brushes.Green;
                canvas.FillEllipse(jidlocolor, new Rectangle(jidlohada[i].X * width, jidlohada[i].Y * height, width, height));
            }
            
        }

        private void Form1_KeyPress(object sender, KeyPressEventArgs e)
        {
            
        }

        private void Form1_KeyDown(object sender, KeyEventArgs e)
        {
            
            if (e.KeyCode == Keys.Down && smer != "nahoru")
            {
                smer = "dolu";
            }

            if (e.KeyCode == Keys.Up && smer != "dolu")
            {
                smer = "nahoru";
                
            }

            if (e.KeyCode == Keys.Left && smer != "doprava")
            {
                smer = "doleva";
            }

            if (e.KeyCode == Keys.Right && smer != "doleva")
            {
                smer = "doprava";
            }



            if (Control.ModifierKeys == Keys.Left)
            {
                smer = "doleva";
            }

            if (Control.ModifierKeys == Keys.Right)
            {
                smer = "doprava";
            }
        }

        private void Form1_Resize(object sender, EventArgs e)
        {
        }
    }
}
