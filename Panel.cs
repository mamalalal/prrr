using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.IO;

namespace UkolnicekMO
{
    public partial class Panel : UserControl
    {
        public static Panel panel;
        List<Poznamka> poznamky = new List<Poznamka>();
        public Panel()
        {
            InitializeComponent();
            panel = this;
        }

        public void NacistZnovu()
        {
            for (int i = 0; i < Form1.idcka.Count(); i++)
            {


                Console.WriteLine("adadasd");
                Poznamka poz = new Poznamka(i, Form1.nazvy[i], Form1.texty[i], Form1.casy[i]);
                poznamky.Add(poz);
                Controls.Add(poz);
            }
        }

        private void Panel_Load(object sender, EventArgs e)
        {
            NacistZnovu();
           
        }
    }
}
