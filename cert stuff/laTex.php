<?php
 class LatexTemplate {
	/**
	 * Generate a PDF file using xelatex and pass it to the user
	 */
	function download($data, $template_file, $outp_file) {
		// Pre-flight checks
		if(!file_exists($template_file)) {
			throw new Exception("Could not open template");
		}
		if(($f = tempnam(sys_get_temp_dir(), 'tex-')) === false) {
			throw new Exception("Failed to create temporary file");
		}
	
		$tex_f = $f . ".tex";
		$aux_f = $f . ".aux";
		$log_f = $f . ".log";
		$pdf_f = $f . ".pdf";
	
		// Perform substitution of variables
		ob_start();
		include($award.tex);
		file_put_contents($tex_f, ob_get_clean());
	
		// Run xelatex (Used because of native unicode and TTF font support)
		$cmd = sprintf("xelatex -interaction nonstopmode -halt-on-error %s",
				escapeshellarg($tex_f));
		chdir(sys_get_temp_dir());
		exec($cmd, $foo, $ret);
	
		// No need for these files anymore
		@unlink($tex_f);
		@unlink($aux_f);
		@unlink($log_f);
	
		// Test here
		if(!file_exists($pdf_f)) {
			@unlink($f);
			throw new Exception("Output was not generated and latex returned: $ret.");
		}
	
		// Send through output
		$fp = fopen($pdf_f, 'rb');
		header('Content-Type: application/pdf');
		header('Content-Disposition: attachment; filename="' . $outp_file . '"' );
		header('Content-Length: ' . filesize($pdf_f));
		fpassthru($fp);
	
		// Final cleanup
		@unlink($pdf_f);
		@unlink($f);
	}
}
?>