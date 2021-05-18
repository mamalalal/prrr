using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace GameOfLifeMO
{
    public partial class Form1 : Form
    {
        int procenta = 0;
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            panel1.Jedem();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            timer1.Interval = 500;
            timer1.Start();
            timer1.Tick += panel1.NovaPozice;
        }

        private void button3_Click(object sender, EventArgs e)
        {
            timer1.Stop();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            procenta = int.Parse(numericUpDown1.Value.ToString());
            panel1.NastavitProcenta(procenta);
        }

        private void button5_Click(object sender, EventArgs e)
        {
            panel1.Clear();
        }
    }
}
