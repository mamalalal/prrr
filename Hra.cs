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
    public partial class Hra : Form
    {
        public static bool hrac1 = true;
        public static int body1 = 0;
        public static int body2 = 0;

        public static Hra Current { get; private set; }

        public Hra()
        {
            InitializeComponent();
            label2.Text = Nastaveni.hrac1;
            label3.Text = Nastaveni.hrac1;
            label4.Text = "0";
            label6.Text = "0";
            Hra.Current = this;
        }

        public void ZmenHrace()
        {
            Console.WriteLine(label2.Text);

            Console.WriteLine(Nastaveni.hrac1);
            if (label2.Text == Nastaveni.hrac1)
            {
                label2.Text = Nastaveni.hrac2;
                Console.WriteLine(Nastaveni.hrac2);
            }
            else 
            {
                label2.Text = Nastaveni.hrac1;
            }
            if (hrac1 == true)
            {
                hrac1 = false;

            }
            else 
            {
                hrac1 = true;
            }
            
        }

        public void PrictiBody()
        {
            label4.Text = body1.ToString();
            label6.Text = body2.ToString();
        }

        private void Hra_Load(object sender, EventArgs e)
        {
            
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void label2_Click(object sender, EventArgs e)
        {

        }
    }
}
