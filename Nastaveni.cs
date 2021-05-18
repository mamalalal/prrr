using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace HadMO
{
    public partial class Nastaveni : Form
    {
        public static int velikostx = 200;
        public static int velikosty = 200;
        public static int rychlost = 300;
        public Nastaveni()
        {
            InitializeComponent();
        }

        private void Nastaveni_Load(object sender, EventArgs e)
        {

        }

        private void trackBar1_Scroll(object sender, EventArgs e)
        {
            velikostx = trackBar1.Value;
            label2.Text = velikostx.ToString();

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void trackBar2_Scroll(object sender, EventArgs e)
        {
            velikosty = trackBar2.Value;
            label5.Text = velikosty.ToString();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Menu m = new Menu();
            m.Show();
            this.Hide();
        }

        private void trackBar3_Scroll(object sender, EventArgs e)
        {
            rychlost = trackBar3.Value;
            label8.Text = rychlost.ToString();
        }
    }
}
