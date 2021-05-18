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

namespace UkolnicekMO
{
    public partial class Form1 : Form 
    {
        


        public static List<int> idcka = new List<int>();
        public static List<string> nazvy = new List<string>();
        public static List<string> texty = new List<string>();
        public static List<string> casy = new List<string>();

        public Form1()
        {

            
            
            InitializeComponent();
            idcka.Clear();
            nazvy.Clear();
            texty.Clear();
            casy.Clear();
            var lines = File.ReadAllLines(Directory.GetCurrentDirectory() + "\\Poznamky\\Poznamky.txt");
            var lineCount = File.ReadLines(Directory.GetCurrentDirectory() + "\\Poznamky\\Poznamky.txt").Count();

            

            
            

            

            if (new FileInfo(Directory.GetCurrentDirectory() + "\\Poznamky\\Poznamky.txt").Length == 0)
            {
                
            }
            else 
            {
                for (int i = 0; i < lineCount; i++)
                {
                    
                    if (lines[i] != "")
                    {


                        var Line = lines[i];
                        var fields = Line.Split(',');
                        var id = fields[0];
                        var nazev = fields[1];
                        var text = fields[2];
                        var cas = fields[3];

                        idcka.Add(int.Parse(id));
                        nazvy.Add(nazev);
                        texty.Add(text);
                        casy.Add(cas);

                    }
                }

                for (int i = 0; i < nazvy.Count(); i++)
                {
                    Console.WriteLine(nazvy[i]);
                }

            }

            
           
                
            
            

            

           
                
            
        }

        private void button1_Click(object sender, EventArgs e)
        {
            PridatPoznamku pridat = new PridatPoznamku();
            pridat.Show();
            this.Hide();
        }
        
        public void Obnovit()
        {
            
            idcka.Clear();
            nazvy.Clear();
            texty.Clear();
            casy.Clear();


            var lines = File.ReadAllLines(Directory.GetCurrentDirectory() + "\\Poznamky\\Poznamky.txt");
            var lineCount = File.ReadLines(Directory.GetCurrentDirectory() + "\\Poznamky\\Poznamky.txt").Count();


            if (new FileInfo(Directory.GetCurrentDirectory() + "\\Poznamky\\Poznamky.txt").Length == 0)
            {

            }
            else
            {
                for (int i = 0; i < lineCount; i++)
                {

                    if (lines[i] != "")
                    {


                        var Line = lines[i];
                        var fields = Line.Split(',');
                        var id = fields[0];
                        var nazev = fields[1];
                        var text = fields[2];
                        var cas = fields[3];

                        idcka.Add(int.Parse(id));
                        nazvy.Add(nazev);
                        texty.Add(text);
                        casy.Add(cas);

                    }
                }
            }

            //nacistZnovu();
            
        }

        private void panel1_Load(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            Obnovit();
            
        }
    }
}
