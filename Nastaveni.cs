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
    public partial class Nastaveni : Form
    {
        public static int pocetHracu = 2;
        public static string hrac1 = "Honza";
        public static string hrac2 = "Igor";
        public static string hrac3 = "Roman";
        public static string hrac4 = "Pavel";

        public Nastaveni()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            pocetHracu = int.Parse(numericUpDown1.Value.ToString());
            if (pocetHracu == 2)
            {
               
                if (textBox1.Text != "")
                {
                    hrac1 = textBox1.Text;
                }

                if (textBox2.Text != "")
                {
                    hrac2 = textBox2.Text;
                }
            }
            else if (pocetHracu == 3)
            {
                if (textBox1.Text != "")
                {
                    hrac1 = textBox1.Text;
                }

                if (textBox2.Text != "")
                {
                    hrac2 = textBox2.Text;
                }

                if (textBox3.Text != "")
                {
                    hrac3 = textBox3.Text;
                }


                
            }
            else 
            {
                if (textBox1.Text != "")
                {
                    hrac1 = textBox1.Text;
                }

                if (textBox2.Text != "")
                {
                    hrac2 = textBox2.Text;
                }

                if (textBox3.Text != "")
                {
                    hrac3 = textBox3.Text;
                }

                if (textBox4.Text != "")
                {
                    hrac4 = textBox4.Text;
                }
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Form1 menu = new Form1();
            menu.Show();
            this.Hide();

        }
    }
}
