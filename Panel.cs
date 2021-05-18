using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace GameOfLifeMO
{
    public partial class Panel : UserControl
    {
        int size = 8;
        int x;
        int y;
        int sirka = 80;
        int vyska = 50;
        
        Policko[,] policka = new Policko[80, 50];
        public Panel()
        {
            InitializeComponent();
            for (int i = 0; i < policka.GetLength(0); i++)
            {
                for (int j = 0; j < policka.GetLength(1); j++)
                {
                    
                    Policko p = new Policko();
                    p.IsAlive = false;
                    policka[i, j] = p;
                    
                   

                }
            }
        }

        

        public void NastavitProcenta(int procenta)
        {
            

            Random r = new Random();
            for (int i = 0; i < sirka; i++)
            {
                for (int j = 0; j < vyska; j++)
                {
                    if (r.Next(0,100) < procenta)
                    {
                        policka[i, j].IsAlive = true;
                    }

                   
                    

                }
            }
            Refresh();

        }

        public void Jedem()
        {

            bool[,] stavy = new bool[sirka,vyska];
            for (int i = 0; i < sirka; i++)
            {
                for (int j = 0; j < vyska; j++)
                {
                    int pocetSousedu = SousedCount(i, j);
                    if (policka[i, j].IsAlive == true)
                    {
                       
                        if (pocetSousedu < 2)
                        {
                            stavy[i, j]  = false;

                        }

                        if (pocetSousedu > 3)
                        {
                            stavy[i, j] = false;
                        }

                        if (pocetSousedu < 4 && pocetSousedu > 1)
                        {
                            stavy[i, j] = true;
                        }

                    }
                    else
                    {
                        if (pocetSousedu == 3)
                        {
                            stavy[i, j] = true;
                        }
                    }

                }
            }

            for (int i = 0; i < sirka; i++)
            {
                for (int j = 0; j < vyska; j++)
                {
                    policka[i, j].IsAlive = stavy[i, j];
                }
            }

            Refresh();
        }

        public void NovaPozice(object sender, EventArgs e)
        {
            bool[,] stavy = new bool[sirka, vyska];
            for (int i = 0; i < sirka; i++)
            {
                for (int j = 0; j < vyska; j++)
                {
                    int pocetSousedu = SousedCount(i, j);
                    if (policka[i, j].IsAlive == true)
                    {
                        
                        if (pocetSousedu < 2)
                        {
                            stavy[i, j] = false;

                        }

                        if (pocetSousedu > 3)
                        {
                            
                            stavy[i, j] = false;
                        }

                        if (pocetSousedu < 4 && pocetSousedu > 1)
                        {
                            stavy[i, j] = true;
                        }

                    }
                    else
                    {
                        if (pocetSousedu == 3)
                        {
                            stavy[i, j] = true;
                        }
                    }

                }
            }

            for (int i = 0; i < sirka; i++)
            {
                for (int j = 0; j < vyska; j++)
                {
                    policka[i, j].IsAlive = stavy[i, j];
                }
            }

            Refresh();
        }



        private void Panel_Load(object sender, EventArgs e)
        {

        }

        private void Panel_Click(object sender, EventArgs e)
        {
            
        }

        public int SousedCount(int x, int y)
        {
            int pocetSousedu = 0;
            for (int i = x-1; i <= x +1 ; i++)
            {
                
                if (i < 0 || i > sirka-1)
                {
                    
                }
                else 
                {
                    for (int j = y-1; j <= y+1; j++)
                    {
                        if (j < 0 || j > vyska-1)
                        {
                           
                        }
                        else
                        {
                            if (policka[i,j].IsAlive == true)
                            {
                                pocetSousedu++;
                            }
                            
                            
                        }
                    }
                }
                
            }
            
            if (policka[x,y].IsAlive)
            {
                pocetSousedu--;
            }

            return pocetSousedu;
           
        }

        private void Panel_MouseClick(object sender, MouseEventArgs e)
        {
            x = e.X/ size; 
            y = e.Y / size;

            policka[x, y].IsAlive = true;
            
            

                    Refresh();
            

        }

        public void Clear()
        {
            for (int i = 0; i < sirka; i++)
            {
                for (int j = 0; j < vyska; j++)
                {
                    policka[i, j].IsAlive = false;
                }
            }
            Refresh();
        }

        private void Panel_Paint(object sender, PaintEventArgs e)
        {
            Pen p = new Pen(Color.Black, 1);
            for (int i = 1; i < sirka; i++)
            {
                e.Graphics.DrawLine(p, i * size , 0, i * size, vyska*size);
            }

            for (int i = 1; i < vyska ; i++)
            {
                e.Graphics.DrawLine(p, 0, i* size, sirka * size,i*size);
            }


            for (int i = 0; i < sirka; i++)
            {
                for (int j = 0; j < vyska; j++)
                {
                    policka[i, j].Draw(e.Graphics, i, j, size);
                    
                }
            }
            
        }
    }
}
