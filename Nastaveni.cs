using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace PexesoMO
{
    public partial class Nastaveni : Form
    {
        public static int pocetHracu = 1;
        public static string hrac1 = "Honza";
        public static string hrac2 = "Roman";
        public static int pocetDvojic = 2;

        public Nastaveni()
        {
            InitializeComponent();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            Form1 menu = new Form1();
            menu.Show();
            this.Hide();
        }

        private void listBox1_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void numericUpDown1_ValueChanged(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (numericUpDown1.Value < 1 && numericUpDown1.Value > 2)
            {
                pocetHracu = int.Parse(numericUpDown1.Value.ToString());
            }

            if (textBox1.Text != null)
            {
                hrac1 = textBox1.Text;
            }

            if(textBox1.Text == "")
            {
                hrac1 = "Honza";
            }

            if (textBox2.Text != null && numericUpDown1.Value < 2)
            {
                hrac2 = textBox2.Text;
            }

            if(textBox2.Text == "")
            {
                
                hrac2 = "Roman";
            }

            if (numericUpDown2.Value >= 2 && numericUpDown2.Value <= 16)
            {
                pocetDvojic = int.Parse(numericUpDown2.Value.ToString());
            }

            pocetHracu = int.Parse(numericUpDown1.Value.ToString());
            
        }
    }
}
