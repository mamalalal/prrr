using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace VetsiBereMO
{
    public partial class Hra : Form
    {
        
        bool jednaDva = false;
        bool jednaTri = false;
        bool dvaTri = false;

        bool jednaCtyri = false;
        bool dvaCtyri = false;
        bool triCtyri = false;


        
        bool stejneKarty = false;

        List<Karta> karty = new List<Karta>();

        List<Karta> kartyhrac1 = new List<Karta>();
        List<Karta> kartyhrac2 = new List<Karta>();
        List<Karta> kartyhrac3 = new List<Karta>();
        List<Karta> kartyhrac4 = new List<Karta>();

        List<Karta> kartyVBanku = new List<Karta>();

        int pocetKaret1;
        int pocetKaret2;
        int pocetKaret3;
        int pocetKaret4;

        Karta kartahrac1;
        Karta kartahrac2;
        Karta kartahrac3;
        Karta kartahrac4;

        int nejvyssiHodnota;

        public Hra()
        {
            
            InitializeComponent();

            for (int i = 0; i < 4; i++)
            {
                Karta spodek = new Karta("spodek",1);
                karty.Add(spodek);
                Karta svrsek = new Karta("svršek", 2);
                karty.Add(svrsek);
                Karta kral = new Karta("král", 3);
                karty.Add(kral);
                Karta sedmicka = new Karta("sedmička", 4);
                karty.Add(sedmicka);
                Karta osmicka = new Karta("osmička", 5);
                karty.Add(osmicka);
                Karta devitka = new Karta("devítka", 6);
                karty.Add(devitka);
                Karta desitka = new Karta("desítka", 7);
                karty.Add(desitka);
                Karta eso = new Karta("eso", 8);
                karty.Add(eso);
                
            }
           
            Zamichat();

            if (Nastaveni.pocetHracu == 2)
            {
                label1.Text = Nastaveni.hrac1;
                label2.Text = Nastaveni.hrac2;
                for (int i = 0; i < 32;)
                {
                    kartyhrac1.Add(karty[i]);
                    kartyhrac2.Add(karty[i+1]);
                    i = i + 2;
                    
                }

                pocetKaret1 = 16;
                pocetKaret2 = 16;

                label9.Text = pocetKaret1.ToString();
                label11.Text = pocetKaret2.ToString();

            }
            else if (Nastaveni.pocetHracu == 3)
            {
                label1.Text = Nastaveni.hrac1;
                label2.Text = Nastaveni.hrac2;
                label3.Text = Nastaveni.hrac3;
                for (int i = 0; i < 30;)
                {
                    kartyhrac1.Add(karty[i]);
                    kartyhrac2.Add(karty[i + 1]);
                    kartyhrac3.Add(karty[i + 2]);
                    i = i + 3;

                }

                pocetKaret1 = 10;
                pocetKaret2 = 10;
                pocetKaret3 = 10;

                label9.Text = pocetKaret1.ToString();
                label11.Text = pocetKaret2.ToString();
                label10.Text = pocetKaret3.ToString();
            }
            else 
            {
                label1.Text = Nastaveni.hrac1;
                label2.Text = Nastaveni.hrac2;
                label3.Text = Nastaveni.hrac3;
                label4.Text = Nastaveni.hrac4;
                for (int i = 0; i < 32;)
                {
                    kartyhrac1.Add(karty[i]);
                    kartyhrac2.Add(karty[i + 1]);
                    kartyhrac3.Add(karty[i+2]);
                    kartyhrac4.Add(karty[i + 3]);
                    i = i + 4;

                }

                pocetKaret1 = 8;
                pocetKaret2 = 8;
                pocetKaret3 = 8;
                pocetKaret4 = 8;

                label9.Text = pocetKaret1.ToString();
                label11.Text = pocetKaret2.ToString();
                label10.Text = pocetKaret3.ToString();
                label12.Text = pocetKaret4.ToString();
            }
        }

        public void Zamichat()
        {
            Random r = new Random();
            for (int i = 0; i < 20; i++)
            {
                
                int prvni = r.Next(0,32);
                int druhy = r.Next(0, 32);
                karty[prvni] = karty[druhy];

            }

            
        }

        public async void VyndatKarty()
        {
           
            await Task.Delay(1000);



            if (Nastaveni.pocetHracu == 2)
            {


                if (kartahrac1.hodnota > kartahrac2.hodnota)
                {
                    for (int i = 0; i < kartyVBanku.Count(); i++)
                    {
                        kartyhrac1.Add(kartyVBanku[i]);
                    }

                    pocetKaret1 = pocetKaret1 + kartyVBanku.Count();
                    label9.Text = pocetKaret1.ToString();
                    kartyVBanku.Clear();

                }
                else if (kartahrac1.hodnota < kartahrac2.hodnota)
                {
                    for (int i = 0; i < kartyVBanku.Count(); i++)
                    {
                        kartyhrac2.Add(kartyVBanku[i]);
                    }

                    pocetKaret2 = pocetKaret2 + kartyVBanku.Count();
                    label11.Text = pocetKaret2.ToString();
                    kartyVBanku.Clear();
                }


                if (kartyhrac1.Count() == 0)
                {
                    Konec.vyhral = Nastaveni.hrac2;
                    Konec konec = new Konec();
                    konec.Show();
                    ((Form)this.TopLevelControl).Hide();
                }
                else if (kartyhrac2.Count() == 0)
                {
                    Konec.vyhral = Nastaveni.hrac1;
                    Konec konec = new Konec();
                    konec.Show();
                    ((Form)this.TopLevelControl).Hide();
                }
            }
            else if (Nastaveni.pocetHracu == 3)
            {
                if (kartahrac1.hodnota > kartahrac2.hodnota && kartahrac1.hodnota > kartahrac3.hodnota && kartahrac2.hodnota != kartahrac3.hodnota && stejneKarty == false)
                {

                    for (int i = 0; i < kartyVBanku.Count(); i++)
                    {
                        kartyhrac1.Add(kartyVBanku[i]);
                    }

                    pocetKaret1 = pocetKaret1 + kartyVBanku.Count();
                    label9.Text = pocetKaret1.ToString();
                    kartyVBanku.Clear();

                }
                else if (kartahrac1.hodnota < kartahrac2.hodnota && kartahrac2.hodnota > kartahrac3.hodnota && kartahrac1.hodnota != kartahrac3.hodnota && stejneKarty == false)
                {

                    for (int i = 0; i < kartyVBanku.Count(); i++)
                    {
                        kartyhrac2.Add(kartyVBanku[i]);
                    }

                    pocetKaret2 = pocetKaret2 + kartyVBanku.Count();
                    label11.Text = pocetKaret2.ToString();
                    kartyVBanku.Clear();
                }
                else if (kartahrac3.hodnota > kartahrac2.hodnota && kartahrac3.hodnota > kartahrac1.hodnota && kartahrac2.hodnota != kartahrac1.hodnota && stejneKarty == false)
                {

                    for (int i = 0; i < kartyVBanku.Count(); i++)
                    {
                        kartyhrac3.Add(kartyVBanku[i]);
                    }

                    pocetKaret3 = pocetKaret3 + kartyVBanku.Count();
                    label10.Text = pocetKaret3.ToString();
                    kartyVBanku.Clear();
                }
                else
                {
                    if (kartahrac1.hodnota == kartahrac2.hodnota && kartahrac2.hodnota == kartahrac3.hodnota)
                    {

                    } else if (kartahrac1.hodnota == kartahrac2.hodnota)
                    {
                        stejneKarty = true;
                        jednaDva = true;
                    } else if (kartahrac1.hodnota == kartahrac3.hodnota)
                    {
                        stejneKarty = true;
                        jednaTri = true;
                    } else if (kartahrac2.hodnota == kartahrac3.hodnota)
                    {
                        stejneKarty = true;
                        dvaTri = true;
                    }



                }
            } 
            else if (Nastaveni.pocetHracu == 4)
            {
                if (kartahrac1.hodnota > kartahrac2.hodnota && kartahrac1.hodnota > kartahrac3.hodnota && kartahrac1.hodnota > kartahrac4.hodnota
                    && kartahrac2.hodnota != kartahrac3.hodnota && kartahrac2.hodnota != kartahrac4.hodnota && kartahrac4.hodnota != kartahrac3.hodnota)
                {
                    for (int i = 0; i < kartyVBanku.Count(); i++)
                    {
                        kartyhrac1.Add(kartyVBanku[i]);
                    }

                    pocetKaret1 = pocetKaret1 + kartyVBanku.Count();
                    label9.Text = pocetKaret1.ToString();
                    kartyVBanku.Clear();
                }
                else if (kartahrac2.hodnota > kartahrac1.hodnota && kartahrac2.hodnota > kartahrac3.hodnota && kartahrac2.hodnota > kartahrac4.hodnota
                  && kartahrac3.hodnota != kartahrac1.hodnota && kartahrac4.hodnota != kartahrac1.hodnota && kartahrac4.hodnota != kartahrac3.hodnota)
                {
                    for (int i = 0; i < kartyVBanku.Count(); i++)
                    {
                        kartyhrac2.Add(kartyVBanku[i]);
                    }

                    pocetKaret2 = pocetKaret2 + kartyVBanku.Count();
                    label11.Text = pocetKaret2.ToString();
                    kartyVBanku.Clear();

                }
                else if (kartahrac3.hodnota > kartahrac1.hodnota && kartahrac3.hodnota > kartahrac2.hodnota && kartahrac3.hodnota > kartahrac4.hodnota
                  && kartahrac1.hodnota != kartahrac2.hodnota && kartahrac1.hodnota != kartahrac4.hodnota && kartahrac4.hodnota != kartahrac2.hodnota)
                {
                    for (int i = 0; i < kartyVBanku.Count(); i++)
                    {
                        kartyhrac3.Add(kartyVBanku[i]);
                    }

                    pocetKaret3 = pocetKaret3 + kartyVBanku.Count();
                    label10.Text = pocetKaret3.ToString();
                    kartyVBanku.Clear();

                }
                else if (kartahrac4.hodnota > kartahrac1.hodnota && kartahrac4.hodnota > kartahrac2.hodnota && kartahrac4.hodnota > kartahrac3.hodnota
                  && kartahrac1.hodnota != kartahrac2.hodnota && kartahrac1.hodnota != kartahrac3.hodnota && kartahrac3.hodnota != kartahrac2.hodnota)
                {
                    for (int i = 0; i < kartyVBanku.Count(); i++)
                    {
                        kartyhrac4.Add(kartyVBanku[i]);
                    }

                    pocetKaret4 = pocetKaret4 + kartyVBanku.Count();
                    label12.Text = pocetKaret4.ToString();
                    kartyVBanku.Clear();
                }
                else 
                {

                    if (kartahrac1.hodnota == kartahrac2.hodnota && kartahrac2.hodnota == kartahrac3.hodnota)
                    {

                    }
                    else if (kartahrac1.hodnota == kartahrac2.hodnota)
                    {
                        stejneKarty = true;
                        jednaDva = true;
                    }
                    else if (kartahrac1.hodnota == kartahrac3.hodnota)
                    {
                        stejneKarty = true;
                        jednaTri = true;
                    }
                    else if (kartahrac2.hodnota == kartahrac3.hodnota)
                    {
                        stejneKarty = true;
                        dvaTri = true;
                    } 
                    else if (kartahrac1.hodnota == kartahrac4.hodnota)
                    {
                        stejneKarty = true;
                        jednaCtyri = true;
                    }
                    else if (kartahrac2.hodnota == kartahrac4.hodnota)
                    {
                        stejneKarty = true;
                        dvaCtyri = true;
                    }
                    else if (kartahrac3.hodnota == kartahrac4.hodnota)
                    {
                        stejneKarty = true;
                        triCtyri = true;
                    } 
                    



                }
            }
            if (pocetKaret1 == 32)
            {
                Konec konec = new Konec();
                Konec.vyhral = Nastaveni.hrac1;
                konec.Show();
                ((Form)this.TopLevelControl).Hide();

            }

            if (pocetKaret2 == 32)
            {
                Konec konec = new Konec();
                Konec.vyhral = Nastaveni.hrac2;
                konec.Show();
                ((Form)this.TopLevelControl).Hide();
            }

            if (pocetKaret3 == 32)
            {
                Konec konec = new Konec();
                Konec.vyhral = Nastaveni.hrac3;
                konec.Show();
                ((Form)this.TopLevelControl).Hide();
            }

            if (pocetKaret4 == 32)
            {
                Konec konec = new Konec();
                Konec.vyhral = Nastaveni.hrac4;
                konec.Show();
                ((Form)this.TopLevelControl).Hide();
            }




        }


        public void StejneKarty()
        {

            

            if (kartahrac1 != null & kartahrac2 != null)
            {
                if (jednaDva == true && kartahrac1.hodnota != kartahrac2.hodnota)
                {
                    jednaDva = false;
                    if (kartahrac1.hodnota > kartahrac2.hodnota)
                    {
                        for (int i = 0; i < kartyVBanku.Count(); i++)
                        {
                            kartyhrac1.Add(kartyVBanku[i]);
                        }

                        pocetKaret1 = pocetKaret1 + kartyVBanku.Count();
                        label9.Text = pocetKaret1.ToString();
                        kartyVBanku.Clear();
                    }
                    else
                    {
                        for (int i = 0; i < kartyVBanku.Count(); i++)
                        {
                            kartyhrac2.Add(kartyVBanku[i]);
                        }

                        pocetKaret2 = pocetKaret2 + kartyVBanku.Count();
                        label11.Text = pocetKaret2.ToString();
                        kartyVBanku.Clear();
                    }
                }
            }

            if (kartahrac1 != null & kartahrac3 != null)
            {
                if (jednaTri == true && kartahrac1.hodnota != kartahrac3.hodnota)
                {
                    jednaTri = false;
                    if (kartahrac1.hodnota > kartahrac3.hodnota)
                    {
                        for (int i = 0; i < kartyVBanku.Count(); i++)
                        {
                            kartyhrac1.Add(kartyVBanku[i]);
                        }

                        pocetKaret1 = pocetKaret1 + kartyVBanku.Count();
                        label9.Text = pocetKaret1.ToString();
                        kartyVBanku.Clear();
                    }
                    else
                    {
                        for (int i = 0; i < kartyVBanku.Count(); i++)
                        {
                            kartyhrac3.Add(kartyVBanku[i]);
                        }

                        pocetKaret3 = pocetKaret3 + kartyVBanku.Count();
                        label10.Text = pocetKaret3.ToString();
                        kartyVBanku.Clear();
                    }
                }
            }

            if (kartahrac3 != null & kartahrac2 != null)
            {
                if (dvaTri == true && kartahrac2.hodnota != kartahrac3.hodnota)
                {
                    dvaTri = false;
                    if (kartahrac2.hodnota > kartahrac3.hodnota)
                    {
                        for (int i = 0; i < kartyVBanku.Count(); i++)
                        {
                            kartyhrac2.Add(kartyVBanku[i]);
                        }

                        pocetKaret2 = pocetKaret2 + kartyVBanku.Count();
                        label11.Text = pocetKaret2.ToString();
                        kartyVBanku.Clear();
                    }
                    else
                    {
                        for (int i = 0; i < kartyVBanku.Count(); i++)
                        {
                            kartyhrac3.Add(kartyVBanku[i]);
                        }

                        pocetKaret3 = pocetKaret3 + kartyVBanku.Count();
                        label10.Text = pocetKaret3.ToString();
                        kartyVBanku.Clear();
                    }
                }
            }

            if (kartahrac1 != null & kartahrac4 != null)
            {
                if (jednaCtyri == true && kartahrac1.hodnota != kartahrac4.hodnota)
                {
                    jednaCtyri = false;
                    if (kartahrac1.hodnota > kartahrac4.hodnota)
                    {
                        for (int i = 0; i < kartyVBanku.Count(); i++)
                        {
                            kartyhrac1.Add(kartyVBanku[i]);
                        }

                        pocetKaret1 = pocetKaret1 + kartyVBanku.Count();
                        label9.Text = pocetKaret1.ToString();
                        kartyVBanku.Clear();
                    }
                    else
                    {
                        for (int i = 0; i < kartyVBanku.Count(); i++)
                        {
                            kartyhrac4.Add(kartyVBanku[i]);
                        }

                        pocetKaret4 = pocetKaret4 + kartyVBanku.Count();
                        label12.Text = pocetKaret4.ToString();
                        kartyVBanku.Clear();
                    }
                }
            }

            if (kartahrac2 != null & kartahrac4 != null)
            {
                if (dvaCtyri == true && kartahrac2.hodnota != kartahrac4.hodnota)
                {
                    dvaCtyri = false;
                    if (kartahrac2.hodnota > kartahrac4.hodnota)
                    {
                        for (int i = 0; i < kartyVBanku.Count(); i++)
                        {
                            kartyhrac2.Add(kartyVBanku[i]);
                        }

                        pocetKaret2 = pocetKaret2 + kartyVBanku.Count();
                        label11.Text = pocetKaret2.ToString();
                        kartyVBanku.Clear();
                    }
                    else
                    {
                        for (int i = 0; i < kartyVBanku.Count(); i++)
                        {
                            kartyhrac4.Add(kartyVBanku[i]);
                        }

                        pocetKaret4 = pocetKaret4 + kartyVBanku.Count();
                        label12.Text = pocetKaret4.ToString();
                        kartyVBanku.Clear();
                    }
                }
            }

            if (kartahrac3 != null & kartahrac4 != null)
            {
                if (triCtyri == true && kartahrac3.hodnota != kartahrac4.hodnota)
                {
                    triCtyri = false;
                    if (kartahrac3.hodnota > kartahrac4.hodnota)
                    {
                        for (int i = 0; i < kartyVBanku.Count(); i++)
                        {
                            kartyhrac3.Add(kartyVBanku[i]);
                        }

                        pocetKaret3 = pocetKaret3 + kartyVBanku.Count();
                        label10.Text = pocetKaret3.ToString();
                        kartyVBanku.Clear();
                    }
                    else
                    {
                        for (int i = 0; i < kartyVBanku.Count(); i++)
                        {
                            kartyhrac4.Add(kartyVBanku[i]);
                        }

                        pocetKaret4 = pocetKaret4 + kartyVBanku.Count();
                        label12.Text = pocetKaret4.ToString();
                        kartyVBanku.Clear();
                    }
                }
            }

            if (pocetKaret1 == 32)
            {
                Konec konec = new Konec();
                Konec.vyhral = Nastaveni.hrac1;
                konec.Show();
                ((Form)this.TopLevelControl).Hide();

            }

            if (pocetKaret2 == 32)
            {
                Konec konec = new Konec();
                Konec.vyhral = Nastaveni.hrac2;
                konec.Show();
                ((Form)this.TopLevelControl).Hide();
            }

            if (pocetKaret3 == 32)
            {
                Konec konec = new Konec();
                Konec.vyhral = Nastaveni.hrac3;
                konec.Show();
                ((Form)this.TopLevelControl).Hide();
            }

            if (pocetKaret4 == 32)
            {
                Konec konec = new Konec();
                Konec.vyhral = Nastaveni.hrac4;
                konec.Show();
                ((Form)this.TopLevelControl).Hide();
            }

        }




        private void button1_Click(object sender, EventArgs e)
        {
            kartahrac1 = null;
            kartahrac2 = null;
            kartahrac3 = null;
            kartahrac4 = null;


            if (Nastaveni.pocetHracu == 2)
            {

                kartahrac1 = kartyhrac1[0];
                kartahrac2 = kartyhrac2[0];

                kartyVBanku.Add(kartyhrac1[0]);
                kartyVBanku.Add(kartyhrac2[0]);

                label5.Text = kartahrac1.nazev;
                label6.Text = kartahrac2.nazev;

                kartyhrac1.Remove(kartyhrac1[0]);
                kartyhrac2.Remove(kartyhrac2[0]);

                pocetKaret1 = pocetKaret1 - 1;
                pocetKaret2 = pocetKaret2 - 1;
                label9.Text = pocetKaret1.ToString();
                label11.Text = pocetKaret2.ToString();

                VyndatKarty();
            }
            else if (Nastaveni.pocetHracu == 3 && jednaDva == false && jednaTri == false && dvaTri == false)
            {
                if (pocetKaret1 != 0)
                {
                    kartahrac1 = kartyhrac1[0];
                    kartyVBanku.Add(kartyhrac1[0]);
                    label5.Text = kartahrac1.nazev;
                    kartyhrac1.Remove(kartyhrac1[0]);
                    pocetKaret1 = pocetKaret1 - 1;
                    label9.Text = pocetKaret1.ToString();


                }

                if (pocetKaret2 != 0)
                {
                    kartahrac2 = kartyhrac2[0];
                    kartyVBanku.Add(kartyhrac2[0]);
                    label6.Text = kartahrac2.nazev;
                    kartyhrac2.Remove(kartyhrac2[0]);
                    pocetKaret2 = pocetKaret2 - 1;
                    label11.Text = pocetKaret2.ToString();

                }

                if (pocetKaret3 != 0)
                {
                    kartahrac3 = kartyhrac3[0];
                    kartyVBanku.Add(kartyhrac3[0]);
                    label7.Text = kartahrac3.nazev;
                    kartyhrac3.Remove(kartyhrac3[0]);
                    pocetKaret3 = pocetKaret3 - 1;
                    label10.Text = pocetKaret3.ToString();

                }

                VyndatKarty();
            }
            else if(Nastaveni.pocetHracu == 4 && jednaDva == false && jednaTri == false && dvaTri == false && jednaCtyri == false
                && dvaCtyri == false && triCtyri == false)
            {
                if (pocetKaret1 != 0)
                {
                    kartahrac1 = kartyhrac1[0];
                    kartyVBanku.Add(kartyhrac1[0]);
                    label5.Text = kartahrac1.nazev;
                    kartyhrac1.Remove(kartyhrac1[0]);
                    pocetKaret1 = pocetKaret1 - 1;
                    label9.Text = pocetKaret1.ToString();


                }

                if (pocetKaret2 != 0)
                {
                    kartahrac2 = kartyhrac2[0];
                    kartyVBanku.Add(kartyhrac2[0]);
                    label6.Text = kartahrac2.nazev;
                    kartyhrac2.Remove(kartyhrac2[0]);
                    pocetKaret2 = pocetKaret2 - 1;
                    label11.Text = pocetKaret2.ToString();

                }

                if (pocetKaret3 != 0)
                {
                    kartahrac3 = kartyhrac3[0];
                    kartyVBanku.Add(kartyhrac3[0]);
                    label7.Text = kartahrac3.nazev;
                    kartyhrac3.Remove(kartyhrac3[0]);
                    pocetKaret3 = pocetKaret3 - 1;
                    label10.Text = pocetKaret3.ToString();

                }

                if (pocetKaret4 != 0)
                {
                    kartahrac4 = kartyhrac4[0];
                    kartyVBanku.Add(kartyhrac4[0]);
                    label8.Text = kartahrac4.nazev;
                    kartyhrac4.Remove(kartyhrac4[0]);
                    pocetKaret4 = pocetKaret4 - 1;
                    label12.Text = pocetKaret4.ToString();
                }

                VyndatKarty();
            }

            
            if (jednaDva == true)
            {

                if (pocetKaret1 != 0)
                {
                    kartahrac1 = kartyhrac1[0];
                    kartyVBanku.Add(kartyhrac1[0]);
                    label5.Text = kartahrac1.nazev;
                    kartyhrac1.Remove(kartyhrac1[0]);
                    pocetKaret1 = pocetKaret1 - 1;
                    label9.Text = pocetKaret1.ToString();


                }

                if (pocetKaret2 != 0)
                {
                    kartahrac2 = kartyhrac2[0];
                    kartyVBanku.Add(kartyhrac2[0]);
                    label6.Text = kartahrac2.nazev;
                    kartyhrac2.Remove(kartyhrac2[0]);
                    pocetKaret2 = pocetKaret2 - 1;
                    label11.Text = pocetKaret2.ToString();

                }



                StejneKarty();
               
            }

            if (jednaTri == true)
            {
                if (pocetKaret1 != 0)
                {
                    kartahrac1 = kartyhrac1[0];
                    kartyVBanku.Add(kartyhrac1[0]);
                    label5.Text = kartahrac1.nazev;
                    kartyhrac1.Remove(kartyhrac1[0]);
                    pocetKaret1 = pocetKaret1 - 1;
                    label9.Text = pocetKaret1.ToString();


                }

                if (pocetKaret3 != 0)
                {
                    kartahrac3 = kartyhrac3[0];
                    kartyVBanku.Add(kartyhrac3[0]);
                    label7.Text = kartahrac3.nazev;
                    kartyhrac3.Remove(kartyhrac3[0]);
                    pocetKaret3 = pocetKaret3 - 1;
                    label10.Text = pocetKaret3.ToString();

                }


               

                StejneKarty();

            }
            if (jednaCtyri == true)
            {
                if (pocetKaret1 != 0)
                {
                    kartahrac1 = kartyhrac1[0];
                    kartyVBanku.Add(kartyhrac1[0]);
                    label5.Text = kartahrac1.nazev;
                    kartyhrac1.Remove(kartyhrac1[0]);
                    pocetKaret1 = pocetKaret1 - 1;
                    label9.Text = pocetKaret1.ToString();


                }

                if (pocetKaret4 != 0)
                {
                    kartahrac4 = kartyhrac4[0];
                    kartyVBanku.Add(kartyhrac4[0]);
                    label8.Text = kartahrac4.nazev;
                    kartyhrac4.Remove(kartyhrac4[0]);
                    pocetKaret4 = pocetKaret4 - 1;
                    label12.Text = pocetKaret4.ToString();
                }

                StejneKarty();

            }

            if (dvaTri == true)
            {
                if (pocetKaret2 != 0)
                {
                    kartahrac2 = kartyhrac2[0];
                    kartyVBanku.Add(kartyhrac2[0]);
                    label6.Text = kartahrac2.nazev;
                    kartyhrac2.Remove(kartyhrac2[0]);
                    pocetKaret2 = pocetKaret2 - 1;
                    label11.Text = pocetKaret2.ToString();

                }

                if (pocetKaret3 != 0)
                {
                    kartahrac3 = kartyhrac3[0];
                    kartyVBanku.Add(kartyhrac3[0]);
                    label7.Text = kartahrac3.nazev;
                    kartyhrac3.Remove(kartyhrac3[0]);
                    pocetKaret3 = pocetKaret3 - 1;
                    label10.Text = pocetKaret3.ToString();

                }

              
                StejneKarty();

            }

            if (dvaCtyri == true)
            {

                if (pocetKaret2 != 0)
                {
                    kartahrac2 = kartyhrac2[0];
                    kartyVBanku.Add(kartyhrac2[0]);
                    label6.Text = kartahrac2.nazev;
                    kartyhrac2.Remove(kartyhrac2[0]);
                    pocetKaret2 = pocetKaret2 - 1;
                    label11.Text = pocetKaret2.ToString();

                }


                if (pocetKaret4 != 0)
                {
                    kartahrac4 = kartyhrac4[0];
                    kartyVBanku.Add(kartyhrac4[0]);
                    label8.Text = kartahrac4.nazev;
                    kartyhrac4.Remove(kartyhrac4[0]);
                    pocetKaret4 = pocetKaret4 - 1;
                    label12.Text = pocetKaret4.ToString();
                }

                StejneKarty();

            }
            if (triCtyri == true)
            {
                if (pocetKaret3 != 0)
                {
                    kartahrac3 = kartyhrac3[0];
                    kartyVBanku.Add(kartyhrac3[0]);
                    label7.Text = kartahrac3.nazev;
                    kartyhrac3.Remove(kartyhrac3[0]);
                    pocetKaret3 = pocetKaret3 - 1;
                    label10.Text = pocetKaret3.ToString();

                }

                if (pocetKaret4 != 0)
                {
                    kartahrac4 = kartyhrac4[0];
                    kartyVBanku.Add(kartyhrac4[0]);
                    label8.Text = kartahrac4.nazev;
                    kartyhrac4.Remove(kartyhrac4[0]);
                    pocetKaret4 = pocetKaret4 - 1;
                    label12.Text = pocetKaret4.ToString();
                }

               
                StejneKarty();

            }











        }
    }
}
