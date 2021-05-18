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
    
    public partial class Hra : Form
    {

        public static Hra Current { get; private set; }
        public static string vyhral = "";
        public Hra()
        {
            InitializeComponent();
            Current = this;
        
        }
    }
}
