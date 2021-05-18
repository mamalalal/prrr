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

using static UkolnicekMO.Panel;
namespace UkolnicekMO
{

    public partial class Poznamka : UserControl
    {


        public int id;
        string nazev;
        string text;
        string cas;
        public Poznamka(int id, string nazev, string text, string cas)
        {
            InitializeComponent();


            this.id = id;
            this.nazev = nazev;
            this.text = text;
            this.cas = cas;
            Location = new Point(0, id * Height);

            label2.Text = nazev;
            label1.Text = text;
            label3.Text = cas;

        }

        private void button1_Click(object sender, EventArgs e)
        {
            var oldLines = System.IO.File.ReadAllLines(Directory.GetCurrentDirectory() + "\\Poznamky\\Poznamky.txt");
            var newLines = oldLines.Where(line => !line.Contains(cas));
            System.IO.File.WriteAllLines(Directory.GetCurrentDirectory() + "\\Poznamky\\Poznamky.txt", newLines);

            //Obnovit();

        }
    }
        
}
