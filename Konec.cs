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
    public partial class Konec : Form
    {
        public Konec()
        {
            InitializeComponent();
            if (Hra.body1 > Hra.body2)
            {
                label2.Text = Nastaveni.hrac1;
                label3.Text = Hra.body1.ToString();
            }
            else
            {
                label2.Text = Nastaveni.hrac2;
                label3.Text = Hra.body2.ToString();
            }

            
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form1 menu = new Form1();
            menu.Show();
            this.Hide();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Hra hra = new Hra();
            hra.Show();
            ((Form)this.TopLevelControl).Hide();

        }

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }
    }
}
