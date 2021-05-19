namespace GameOfLifeMO
{
    partial class Panel
    {
        /// <summary> 
        /// Vyžaduje se proměnná návrháře.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary> 
        /// Uvolněte všechny používané prostředky.
        /// </summary>
        /// <param name="disposing">hodnota true, když by se měl spravovaný prostředek odstranit; jinak false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Kód vygenerovaný pomocí Návrháře komponent

        /// <summary> 
        /// Metoda vyžadovaná pro podporu Návrháře - neupravovat
        /// obsah této metody v editoru kódu.
        /// </summary>
        private void InitializeComponent()
        {
            this.SuspendLayout();
            // 
            // Panel
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.DoubleBuffered = true;
            this.Margin = new System.Windows.Forms.Padding(4);
            this.Name = "Panel";
            this.Size = new System.Drawing.Size(1042, 655);
            this.Load += new System.EventHandler(this.Panel_Load);
            this.Click += new System.EventHandler(this.Panel_Click);
            this.Paint += new System.Windows.Forms.PaintEventHandler(this.Panel_Paint);
            this.MouseClick += new System.Windows.Forms.MouseEventHandler(this.Panel_MouseClick);
            this.ResumeLayout(false);

        }

        #endregion
    }
}
