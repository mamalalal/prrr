using System;
using System.Collections.Generic;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace GameOfLifeMO
{
    class Policko
    {
        
        private bool isAlive = false;

        public bool IsAlive { get => isAlive; set => isAlive = value; }

        Brush b = new SolidBrush(Color.Black);
        Brush w = new SolidBrush(Color.White);

      

         public void Draw(Graphics g, int x, int y, int size)
        {
            if (isAlive == true)
            {
                g.FillRectangle(b, x * size + 1, y * size + 1, size - 1, size - 1);
            }
            else 
            {
                g.FillRectangle(w, x * size + 1, y * size + 1, size - 1, size - 1);
            }
            
        }

    }
}
