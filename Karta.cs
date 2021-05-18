using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace VetsiBereMO
{
    public partial class Karta : UserControl
    {
        public string nazev;
        public int hodnota;
        public Karta(string nazev, int hodnota)
        {
            InitializeComponent();
            this.nazev = nazev;
            this.hodnota = hodnota;
        }
    }
}
