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
    public partial class PridatPoznamku : Form
    {
        
        string nazev;
        string text;
        string cas;
        int dalsiId;
        List<int> idcka = new List<int>();
        
        public PridatPoznamku()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {

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


                        idcka.Add(int.Parse(id));
                        
                    }
                }
                   
                
                
            
            }
            for (int i = 0; i < idcka.Count(); i++)
            {
                Console.WriteLine(idcka[i]);
            }

            if (idcka.Count() == 0)
            {
                dalsiId = 0;
            }
            else 
            {
                dalsiId = idcka[idcka.Count() - 1] + 1;
            }
            

            nazev = textBox1.Text;
            text = richTextBox1.Text;
            cas = System.DateTime.Now.ToString();

            File.AppendAllText(Directory.GetCurrentDirectory() + "\\Poznamky\\Poznamky.txt",dalsiId + "," + nazev + "," + text + "," + cas + Environment.NewLine);

            string message = "Přidat další poznámku?";
            string title = "Poznámka přidána";
            MessageBoxButtons buttons = MessageBoxButtons.YesNo;

            DialogResult result = MessageBox.Show(message, title, buttons);
            if (result == DialogResult.Yes)
            {
                textBox1.Text = "";
                richTextBox1.Clear();
            }
            else 
            {
                Form1 f = new Form1();
                f.Show();
                this.Hide();
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Form1 f = new Form1();
            f.Show();
            this.Hide();
        }
    }
}
