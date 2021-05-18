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
    public partial class Nastaveni : Form
    {
        List<string> samotnaSlova = new List<string>(); 
        string slovo;
        bool stejne = false;
        public static string obtiznost = "snadna";
        public Nastaveni()
        {
            InitializeComponent();
        }

        private void Nastaveni_Load(object sender, EventArgs e)
        {

        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {
          
                

            
        }

        public void Precist()
        {
           
            
            

            
            foreach (string line in File.ReadLines(Directory.GetCurrentDirectory() + "\\Slova.txt"))
            {
                string[] columns = line.Split(',');
                for (int c = 0; c < columns.Length; c++)
                {
                    samotnaSlova.Add(columns[c]);
                }
            }

            for (int i = 0; i < samotnaSlova.Count(); i++)
            {
                if (samotnaSlova[i] == slovo)
                {
                    stejne = true;
                }
            }

            if (stejne == false)
            {
                Zapsat(slovo);
                MessageBox.Show("Slovo přidáno", "Slovo přidáno", MessageBoxButtons.OK);
            }
            else
            {
                MessageBox.Show("Zadané slovo je již v databázi", "Zadané slovo je již v databázi", MessageBoxButtons.OK);
            }

        }

        public void Zapsat(string slovo)
        {
            StreamWriter st = File.AppendText(Directory.GetCurrentDirectory() + "\\Slova.txt");
            st.Write(slovo + ",");
            st.Close();
        }



        private void button1_Click(object sender, EventArgs e)
        {
            stejne = false;
            if (textBox1.Text != "")
            {


                slovo = textBox1.Text.ToUpper();
                Precist();
            }
        }

        private void button5_Click(object sender, EventArgs e)
        {
            Menu m = new Menu();
            m.Show();
            this.Hide();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            obtiznost = "snadna";
        }

        private void button3_Click(object sender, EventArgs e)
        {
            obtiznost = "stredni";
        }

        private void button4_Click(object sender, EventArgs e)
        {
            obtiznost = "tezka";
        }

        private void textBox1_KeyPress(object sender, KeyPressEventArgs e)
        {
            e.Handled = !(char.IsLetter(e.KeyChar) || e.KeyChar == (char)Keys.Back);
        }
    }
}
