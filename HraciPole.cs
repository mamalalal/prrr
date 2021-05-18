using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace PiškvorkyMO
{
    public partial class HraciPole : UserControl
    {
        public static Policko[,] policka = new Policko[Nastaveni.x,Nastaveni.y];
        public static List<int> polickaOkolo = new List<int>();
        public static bool dalsi = false;
        public static bool hledat = true;
        public static int prvniVyhra = 0;
        public static int druhyVyhra = 0;
        public static int jednou = 1;
        public static int polickox = 100;
        public static int polickoy = 0;
        public static int dokud = 0;
        public static int pocetOkolo = 0;
        public HraciPole()
        {
            InitializeComponent();
            for (int i = 0; i < Nastaveni.x; i++)
            {
                for (int j = 0; j < Nastaveni.y; j++)
                {
                    Policko policko = new Policko(i, j);
                    policka[i, j] = policko;
                    Controls.Add(policko);
                    
                }
            }
        }

        private void HraciPole_Load(object sender, EventArgs e)
        {
            
        }
    }
}
