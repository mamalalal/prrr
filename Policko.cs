using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Threading;

namespace PexesoMO
{
    public partial class Policko : UserControl
    {
        int x, y;
        public int id;
        public int X => x;
        public int Y => y;
        int soucet = 0;
        

        private void Policko_MouseClick(object sender, MouseEventArgs e)
        {
            Policko mouse = (Policko)sender;
            int x = mouse.X;
            int y = mouse.Y;

            if (HraciPanel.cekej == true)
            {



                if (HraciPanel.kolo == false)
                {
                    this.BackColor = HraciPanel.barvy[id];
                    HraciPanel.kolo = true;
                    HraciPanel.id1 = this.id;
                    HraciPanel.x1 = this.x;
                    HraciPanel.y1 = this.y;
                }
                else
                {
                    this.BackColor = HraciPanel.barvy[id];
                    HraciPanel.id2 = this.id;
                    HraciPanel.kolo = false;
                    HraciPanel.cekej = false;
                    if (HraciPanel.id1 == HraciPanel.id2)
                    {
                        if (Hra.hrac1 == true)
                        {
                            Hra.body1++;
                            Hra.Current.PrictiBody();
                        }
                        else 
                        {
                            Hra.body2++;
                            Hra.Current.PrictiBody();
                        }

                        for (int i = 0; i < Nastaveni.pocetDvojic; i++)
                        {

                            for (int j = 1; j < 2; j++)
                            {
                                if (HraciPanel.policka[i,j].BackColor != Color.White)
                                {
                                    soucet++;
                                }
                            }
                        }

                        if (soucet == Nastaveni.pocetDvojic)
                        {
                            Konec konec = new Konec();
                            konec.Show();
                            ((Form)this.TopLevelControl).Hide();
                        }

                                HraciPanel.cekej = true;
                    }
                    else
                    {
                        Vrat();






                    }

                }
            }


        }

        public async void Vrat()
        {
                   

            await Task.Delay(2000);

            this.BackColor = Color.White;
            HraciPanel.policka[HraciPanel.x1, HraciPanel.y1].BackColor = Color.White;
            HraciPanel.cekej = true;
            if (Nastaveni.pocetHracu == 2)
            {
                Hra.Current.ZmenHrace();
                
            }
            
        }

        public Policko(int x ,int y, int id )
        {
            InitializeComponent();  
            this.x = x;
            this.y = y;
            this.Location = new Point(x * Width,y*Height);
            this.id = id;
        }


    }
}
