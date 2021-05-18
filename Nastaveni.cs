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

    
    public partial class Nastaveni : Form
    {
        public static int x = 5;
        public static int y = 5;
        public static Image hrac1 = PiškvorkyMO.Properties.Resources._4;
        public static Image hrac2 = PiškvorkyMO.Properties.Resources._1;
        public Nastaveni()
        {
            InitializeComponent();
            
        }

        private void button1_Click(object sender, EventArgs e)
        {
            x = int.Parse(numericUpDown1.Value.ToString());
            y = int.Parse(numericUpDown2.Value.ToString());
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Form1 menu = new Form1();
            menu.Show();
            this.Hide();
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {
            hrac1 = pictureBox1.Image;
        }

        private void pictureBox2_Click(object sender, EventArgs e)
        {
            hrac1 = pictureBox2.Image;
        }

        private void pictureBox3_Click(object sender, EventArgs e)
        {
            hrac1 = pictureBox3.Image;
        }

        private void pictureBox4_Click(object sender, EventArgs e)
        {
            hrac1 = pictureBox4.Image;
        }

        private void pictureBox5_Click(object sender, EventArgs e)
        {
            hrac1 = pictureBox5.Image;
        }

        private void pictureBox6_Click(object sender, EventArgs e)
        {
            hrac1 = pictureBox6.Image;
        }

        private void pictureBox8_Click(object sender, EventArgs e)
        {
            hrac1 = pictureBox8.Image;
        }

        private void pictureBox9_Click(object sender, EventArgs e)
        {
            hrac1 = pictureBox9.Image;
        }

        private void pictureBox16_Click(object sender, EventArgs e)
        {
            hrac2 = pictureBox16.Image;
        }

        private void pictureBox15_Click(object sender, EventArgs e)
        {
            hrac2 = pictureBox15.Image;
        }

        private void pictureBox14_Click(object sender, EventArgs e)
        {
            hrac2 = pictureBox14.Image;
        }

        private void pictureBox13_Click(object sender, EventArgs e)
        {
            hrac2 = pictureBox13.Image;
        }

        private void pictureBox12_Click(object sender, EventArgs e)
        {
            hrac2 = pictureBox12.Image;
        }

        private void pictureBox11_Click(object sender, EventArgs e)
        {
            hrac2 = pictureBox11.Image;
        }

        private void pictureBox10_Click(object sender, EventArgs e)
        {
            hrac2 = pictureBox10.Image;
        }

        private void pictureBox7_Click(object sender, EventArgs e)
        {
            hrac2 = pictureBox7.Image;
        }
    }
}
