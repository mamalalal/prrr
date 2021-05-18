using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace PiškvorkyMO
{
    public partial class Policko : UserControl
    {
        int x, y;
        public int X => x;
        public int Y => y;
        int soucet = 1;
        Random r = new Random();
        int random;
        int remiza;

        public async void Druhy()
        {
            

            
            await Task.Delay(1000);


            if (x + 1 < Nastaveni.x)
            {
                if (HraciPole.policka[x + 1, y].BackgroundImage == null)
                {
                    HraciPole.polickaOkolo.Add(1);
                }
            }

            if (x + 1 < Nastaveni.x && y + 1 < Nastaveni.y)
            {
                if (HraciPole.policka[x + 1, y + 1].BackgroundImage == null)
                {
                    HraciPole.polickaOkolo.Add(1);
                }
            }

            if (y + 1 < Nastaveni.y)
            {
                if (HraciPole.policka[x, y + 1].BackgroundImage == null)
                {
                    HraciPole.polickaOkolo.Add(1);
                }
            }

            if (x - 1 > 0 && y + 1 < Nastaveni.y)
            {
                if (HraciPole.policka[x - 1, y + 1].BackgroundImage == null)
                {
                    HraciPole.polickaOkolo.Add(1);
                }
            }

            if (x - 1 > 0)
            {
                if (HraciPole.policka[x - 1, y].BackgroundImage == null)
                {
                    HraciPole.polickaOkolo.Add(1);
                }
            }

            if (x - 1 > 0 && y - 1 > 0)
            {
                if (HraciPole.policka[x - 1, y - 1].BackgroundImage == null)
                {
                    HraciPole.polickaOkolo.Add(1);
                }
            }

            if (y - 1 > 0)
            {
                if (HraciPole.policka[x, y - 1].BackgroundImage == null)
                {
                    HraciPole.polickaOkolo.Add(1);
                }
            }

            if (x + 1 < Nastaveni.x && y - 1 > 0)
            {
                if (HraciPole.policka[x + 1, y - 1].BackgroundImage == null)
                {
                    HraciPole.polickaOkolo.Add(1);
                }
            }


            
                    int dokud = 1;

            for (int i = 0; i < dokud;)
            {
                Random r = new Random();
                random = r.Next(1, 9);
                
                Console.WriteLine(HraciPole.polickaOkolo.Count() + "velikost listu ");
                Console.WriteLine(HraciPole.pocetOkolo + "počet okolo");

                if (HraciPole.polickaOkolo.Count() > HraciPole.pocetOkolo )
                {



                    if (random == 1 && x + 1 < Nastaveni.x)
                    {
                        if (HraciPole.policka[x + 1, y].BackgroundImage == null)
                        {


                            HraciPole.policka[x + 1, y].BackgroundImage = Nastaveni.hrac2;
                            VratKontrolu();

                            HraciPole.pocetOkolo++;
                            i++;
                        }
                    }
                    else if (random == 2 && x + 1 < Nastaveni.x && y + 1 < Nastaveni.y)
                    {
                        if (HraciPole.policka[x + 1, y + 1].BackgroundImage == null)
                        {

                            HraciPole.pocetOkolo++;

                            HraciPole.policka[x + 1, y + 1].BackgroundImage = Nastaveni.hrac2;
                            VratKontrolu();

                            i++;
                        }
                    }
                    else if (random == 3 && y + 1 < Nastaveni.y)
                    {
                        if (HraciPole.policka[x, y + 1].BackgroundImage == null)
                        {
                            HraciPole.policka[x, y + 1].BackgroundImage = Nastaveni.hrac2;
                            VratKontrolu();
                            HraciPole.pocetOkolo++;

                            i++;
                        }
                    }
                    else if (random == 4 && x - 1 > 0 && y + 1 < Nastaveni.y)
                    {
                        if (HraciPole.policka[x - 1, y + 1].BackgroundImage == null)
                        {
                            HraciPole.policka[x - 1, y + 1].BackgroundImage = Nastaveni.hrac2;
                            VratKontrolu();
                            HraciPole.pocetOkolo++;

                            i++;
                        }
                    }
                    else if (random == 5 && x - 1 > 0)
                    {
                        if (HraciPole.policka[x - 1, y].BackgroundImage == null)
                        {


                            HraciPole.policka[x - 1, y].BackgroundImage = Nastaveni.hrac2;
                            VratKontrolu();
                            HraciPole.pocetOkolo++;

                            i++;
                        }
                    }
                    else if (random == 6 && x - 1 > 0 && y - 1 > 0)
                    {
                        if (HraciPole.policka[x - 1, y - 1].BackgroundImage == null)
                        {


                            HraciPole.policka[x - 1, y - 1].BackgroundImage = Nastaveni.hrac2;
                            VratKontrolu();
                            HraciPole.pocetOkolo++;

                            i++;
                        }
                    }
                    else if (random == 7 && y - 1 > 0)
                    {
                        if (HraciPole.policka[x, y - 1].BackgroundImage == null)
                        {


                            HraciPole.policka[x, y - 1].BackgroundImage = Nastaveni.hrac2;
                            VratKontrolu();
                            HraciPole.pocetOkolo++;

                            i++;
                        }
                    }
                    else if (random == 8 && x + 1 < Nastaveni.x && y - 1 > 0)
                    {
                        if (HraciPole.policka[x + 1, y - 1].BackgroundImage == null)
                        {


                            HraciPole.policka[x + 1, y - 1].BackgroundImage = Nastaveni.hrac2;
                            VratKontrolu();
                            HraciPole.pocetOkolo++;

                            i++;
                        }
                    }
                    else
                    {
                        Console.WriteLine("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
                    }


                }
                else
                {
                    
                    i = i + 8;
                    
                    int kolik = 1;
                    for (int g = 0; g < kolik; g++)
                    {
                        Random erko = new Random();
                        int x = erko.Next(0, Nastaveni.x);
                        int y = erko.Next(0, Nastaveni.y);
                        
                        if (HraciPole.policka[x, y].BackgroundImage == null)
                        {
                            HraciPole.policka[x, y].BackgroundImage = Nastaveni.hrac2;
                        }
                        else
                        {
                            kolik++;
                        }

                    }
                }

                VratKontrolu();
            }

        }

        public void VratKontrolu()
        {
            

            if (Form1.rezim == "Pocitac")
            {
                HraciPole.dalsi = false;
            }
        }

        



        private void Policko_MouseClick(object sender, MouseEventArgs e)
        {
            HraciPole.hledat = true;
            HraciPole.prvniVyhra = 0;



            if (Form1.rezim == "Hrac")
            {
                Console.WriteLine(Form1.rezim);

                if (HraciPole.dalsi == false && HraciPole.policka[x,y].BackgroundImage == null)
                {
                    this.BackgroundImage = Nastaveni.hrac1;
                    HraciPole.dalsi = true;
                }
                else if (HraciPole.policka[x, y].BackgroundImage == null)
                {
                    this.BackgroundImage = Nastaveni.hrac2;
                    HraciPole.dalsi = false;

                }
            }

            if (Form1.rezim == "Pocitac")
            {
                if (HraciPole.dalsi == false && HraciPole.policka[x, y].BackgroundImage == null)
                {
                    this.BackgroundImage = Nastaveni.hrac1;
                    HraciPole.dalsi = true;
                    HraciPole.polickaOkolo.Clear();
                    Druhy();
                }
                    
                
            }


            

            for (int i = 0; i < Nastaveni.x; i++)
            {
                for (int j = 0; j < Nastaveni.y; j++)
                {

                    if (HraciPole.policka[i, j].BackgroundImage == Nastaveni.hrac1)
                    {
                        HraciPole.polickox = i;
                        HraciPole.polickoy = j;


                        for (int a = 0; a < Nastaveni.y; a++)
                        {
                            if (HraciPole.policka[HraciPole.polickox, a].BackgroundImage == Nastaveni.hrac1)
                            {



                                HraciPole.prvniVyhra++;
                            }

                        }





                        if (HraciPole.prvniVyhra == 5)
                        {

                            if (HraciPole.jednou == 1)
                            {
                                Hra.vyhral = "Hráč 1";
                                Konec konec = new Konec();
                                konec.Show();
                                ((Form)this.TopLevelControl).Hide();
                                HraciPole.jednou++;
                            }

                        }
                        else
                        {
                            soucet++;
                            soucet++;
                            HraciPole.prvniVyhra = 0;
                        }

                    }
                }

            }


            for (int i = 0; i < Nastaveni.x; i++)
            {
                for (int j = 0; j < Nastaveni.y; j++)
                {

                    if (HraciPole.policka[i, j].BackgroundImage == Nastaveni.hrac1)
                    {

                        HraciPole.polickox = i;
                        HraciPole.polickoy = j;

                        for (int a = 0; a < Nastaveni.x; a++)
                        {

                            if (HraciPole.policka[a, HraciPole.polickoy].BackgroundImage == Nastaveni.hrac1)
                            {

                                HraciPole.prvniVyhra++;
                            }

                        }

                        if (HraciPole.prvniVyhra == 5)
                        {

                            if (HraciPole.jednou == 1)
                            {
                                Hra.vyhral = "Hráč 1";
                                Konec konec = new Konec();
                                konec.Show();
                                ((Form)this.TopLevelControl).Hide();
                                HraciPole.jednou++;
                            }

                        }
                        else
                        {
                            soucet++;
                            HraciPole.prvniVyhra = 0;
                        }

                    }
                }
            }



            for (int i = 0; i < Nastaveni.x; i++)
            {
                for (int j = 0; j < Nastaveni.y; j++)
                {

                    if (HraciPole.policka[i, j].BackgroundImage == Nastaveni.hrac1)
                    {
                        HraciPole.polickox = i;
                        HraciPole.polickoy = j;


                        for (int a = 0; a < Nastaveni.x; a++)
                        {


                            for (int b = 0; b < Nastaveni.y; b++)
                            {
                                if (HraciPole.policka[a, b].BackgroundImage == Nastaveni.hrac1 && a == b)
                                {
                                    Console.WriteLine(a);
                                    Console.WriteLine(b);
                                    HraciPole.prvniVyhra++;
                                    Console.WriteLine("asdasd nechap ute ");
                                }

                            }
                        }


                        if (HraciPole.prvniVyhra == 5)
                        {


                            if (HraciPole.jednou == 1)
                            {
                                Hra.vyhral = "Hráč 1";
                                Konec konec = new Konec();
                                konec.Show();
                                ((Form)this.TopLevelControl).Hide();
                                HraciPole.jednou++;
                            }

                        }
                        else
                        {
                            soucet++;
                            soucet++;
                            HraciPole.prvniVyhra = 0;
                        }

                    }
                }









              


            }

            
            for (int i = 0; i < Nastaveni.x; i++)
            {
                for (int j = 0; j < Nastaveni.y; j++)
                {

                    if (HraciPole.policka[i, j].BackgroundImage == Nastaveni.hrac1)
                    {
                        HraciPole.polickox = i;
                        HraciPole.polickoy = j;
                        
                        for (int a = 0; a < Nastaveni.x; a++)
                        {


                            for (int b = 0; b < Nastaveni.y; b++)
                            {
                                if (HraciPole.policka[a, b].BackgroundImage == Nastaveni.hrac1 && a+b == Nastaveni.x-1)
                                {
                                    Console.WriteLine(a);
                                    Console.WriteLine(b);
                                    HraciPole.prvniVyhra++;
                                    Console.WriteLine("asdasd tak co ti jeeeeeeeeeeeeeeee");
                                }

                            }
                        }


                        if (HraciPole.prvniVyhra == 5)
                        {

                            if (HraciPole.jednou == 1)
                            {
                                Hra.vyhral = "Hráč 1";
                                Konec konec = new Konec();
                                konec.Show();
                                ((Form)this.TopLevelControl).Hide();
                                HraciPole.jednou++;
                            }
                            

                        }
                        else
                        {
                            


                            soucet++;
                            soucet++;
                            HraciPole.prvniVyhra = 0;
                        }

                    }
                }

            

            }








                for (int i = 0; i < Nastaveni.x; i++)
                {
                    for (int j = 0; j < Nastaveni.y; j++)
                    {

                        if (HraciPole.policka[i, j].BackgroundImage == Nastaveni.hrac2)
                        {
                            HraciPole.polickox = i;
                            HraciPole.polickoy = j;


                            for (int a = 0; a < Nastaveni.y; a++)
                            {
                                if (HraciPole.policka[HraciPole.polickox, a].BackgroundImage == Nastaveni.hrac2)
                                {



                                    HraciPole.druhyVyhra++;
                                }

                            }





                            if (HraciPole.druhyVyhra == 5)
                            {

                                if (HraciPole.jednou == 1)
                                {
                                Hra.vyhral = "Hráč 2";
                                Konec konec = new Konec();
                                    konec.Show();
                                    ((Form)this.TopLevelControl).Hide();
                                    HraciPole.jednou++;
                                }

                            }
                            else
                            {
                                soucet++;
                                soucet++;
                                HraciPole.druhyVyhra = 0;
                            }

                        }
                    }

                }


                for (int i = 0; i < Nastaveni.x; i++)
                {
                    for (int j = 0; j < Nastaveni.y; j++)
                    {

                        if (HraciPole.policka[i, j].BackgroundImage == Nastaveni.hrac2)
                        {

                            HraciPole.polickox = i;
                            HraciPole.polickoy = j;

                            for (int a = 0; a < Nastaveni.x; a++)
                            {

                                if (HraciPole.policka[a, HraciPole.polickoy].BackgroundImage == Nastaveni.hrac2)
                                {

                                    HraciPole.druhyVyhra++;
                                }

                            }

                            if (HraciPole.druhyVyhra == 5)
                            {

                                if (HraciPole.jednou == 1)
                                {
                                Hra.vyhral = "Hráč 2";
                                Konec konec = new Konec();
                                    konec.Show();
                                    ((Form)this.TopLevelControl).Hide();
                                    HraciPole.jednou++;
                                }

                            }
                            else
                            {

                                HraciPole.druhyVyhra = 0;
                            }

                        }
                    }
                }



                for (int i = 0; i < Nastaveni.x; i++)
                {
                    for (int j = 0; j < Nastaveni.y; j++)
                    {

                        if (HraciPole.policka[i, j].BackgroundImage == Nastaveni.hrac2)
                        {
                            HraciPole.polickox = i;
                            HraciPole.polickoy = j;


                            for (int a = 0; a < Nastaveni.x; a++)
                            {


                                for (int b = 0; b < Nastaveni.y; b++)
                                {
                                    if (HraciPole.policka[a, b].BackgroundImage == Nastaveni.hrac2 && a == b)
                                    {
                                        HraciPole.druhyVyhra++;
                                        Console.WriteLine("asdasd je be ti ");
                                    }

                                }
                            }


                            if (HraciPole.druhyVyhra == 5)
                            {


                                if (HraciPole.jednou == 1)
                                {
                                Hra.vyhral = "Hráč 2";
                                Konec konec = new Konec();
                                    konec.Show();
                                    ((Form)this.TopLevelControl).Hide();
                                    HraciPole.jednou++;
                                }

                            }
                            else
                            {
                                soucet++;
                                soucet++;
                                HraciPole.druhyVyhra = 0;
                            }

                        }
                    }











                }


                for (int i = 0; i < Nastaveni.x; i++)
                {
                    for (int j = 0; j < Nastaveni.y; j++)
                    {

                        if (HraciPole.policka[i, j].BackgroundImage == Nastaveni.hrac2)
                        {
                            HraciPole.polickox = i;
                            HraciPole.polickoy = j;

                            for (int a = 0; a < Nastaveni.x; a++)
                            {


                                for (int b = 0; b < Nastaveni.y; b++)
                                {
                                    if (HraciPole.policka[a, b].BackgroundImage == Nastaveni.hrac2 && a + b == Nastaveni.x - 1)
                                    {
                                        HraciPole.druhyVyhra++;

                                    }

                                }
                            }


                            if (HraciPole.druhyVyhra == 5)
                            {

                                if (HraciPole.jednou == 1)
                                {
                                    Hra.vyhral = "Hráč 2";
                                    Konec konec = new Konec();
                                    konec.Show();
                                    ((Form)this.TopLevelControl).Hide();
                                    HraciPole.jednou++;
                                }


                            }
                            else
                            {
                                soucet++;
                                soucet++;
                                HraciPole.druhyVyhra = 0;
                            }

                        }
                    }



                }

           



            for (int i = 0; i < Nastaveni.x; i++)
            {
                for (int j = 0; j < Nastaveni.y; j++)
                {
                    if (HraciPole.policka[i, j].BackgroundImage == null)
                    {
                        remiza++;
                    }
                }
            }
            if (remiza == 0 && HraciPole.prvniVyhra != 5 && HraciPole.druhyVyhra != 5)
            {
                Hra.vyhral = "Remiza";
                Konec konec = new Konec();
                konec.Show();
                ((Form)this.TopLevelControl).Hide();
               
                

            }


        }



        public Policko(int x, int y)
        {
            InitializeComponent();
            this.x = x;
            this.y = y;
            this.Location = new Point(x * Width, y * Height);
            
        }
    }
}
