using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace PexesoMO
{
    public partial class HraciPanel : UserControl
    {
        
        int dvojice = Nastaveni.pocetDvojic;
        Color barva1 = Color.Blue;
        public static Policko[,] policka = new Policko[16,2];
        public static Color [] barvy = new Color[16];
        public static bool kolo = false;
        public static bool cekej = true;

        public static int id1;
        public static int id2;

        public static int x1;
        public static int y1;

       

        public HraciPanel()
        {
            InitializeComponent();
            for (int i = 0; i < Nastaveni.pocetDvojic; i++)
            {
                for (int j = 0; j < 2; j++)
                {
                    Policko policko = new Policko(i,j,i);
                    policka[i,j] = policko;
                    Controls.Add(policko);


                }
                
            }
            PridejBarvy();
            //NastavBarvy();
            Zamichej();
        }

        public void NastavBarvy()
        {
            
           
            Random r = new Random();
            

            

            for (int i = 0; i < Nastaveni.pocetDvojic; i++)
            {
                
                for (int j = 0; j < 1; j++)
                {
                    
                    Color barva = barvy[i];

                    

                   
                    


                   
                       
                        policka[i, j].BackColor = barva;
                        
                    
                   
                }

            }

            for (int i = 0; i < Nastaveni.pocetDvojic; i++)
            {
               
                for (int j = 1; j < 2; j++)
                {



                    policka[i, j].BackColor = policka[i,j-1].BackColor;
                }
            }
        }

        public void PridejBarvy()
        {

            barvy[0] = Color.Blue;
            barvy[1] = Color.Black;
            barvy[2] = Color.Green;
            barvy[3] = Color.Brown;
            barvy[4] = Color.Yellow;
            barvy[5] = Color.Pink;
            barvy[6] = Color.Purple;
            barvy[7] = Color.Orange;
            barvy[8] = Color.LightBlue;
            barvy[9] = Color.LightGreen;
            barvy[10] = Color.Gray;
            barvy[11] = Color.Chocolate;
            barvy[12] = Color.DarkGreen;
            barvy[13] = Color.DarkRed;
            barvy[14] = Color.Red;
            barvy[15] = Color.DarkBlue;
        }

        public void Zamichej()
        {
            Random r = new Random();
            for (int i = 0; i < 10; i++)
            {
                int randomx1 = r.Next(0,Nastaveni.pocetDvojic);
                int randomy1 = r.Next(0,1);

                int randomx2 = r.Next(0, Nastaveni.pocetDvojic);
                int randomy2 = r.Next(0, 1);

                

                int idcko = policka[randomx1, randomy1].id;
                int idcko2 = policka[randomx2, randomy2].id;



                Console.WriteLine(policka[randomx1, randomy1].id);
                Console.WriteLine(policka[randomx2, randomy2].id);

                policka[randomx1, randomy1].id = idcko2;
                policka[randomx2, randomy2].id = idcko;

                
            }
        }
            
    }
}
