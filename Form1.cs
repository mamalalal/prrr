using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace PiškvorkyMO
{
    public partial class Form1 : Form
    {
        public static string rezim;
        public Form1()
        {
            InitializeComponent();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Nastaveni nas = new Nastaveni();
            nas.Show();
            this.Hide();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            rezim = "Hrac";
            Hra hra = new Hra();
            hra.Show();
            this.Hide();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            rezim = "Pocitac";
            Hra hra = new Hra();
            hra.Show();
            this.Hide();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Pomoc pomoc = new Pomoc();
            pomoc.Show();
            this.Hide();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }
    }
}
