<?php
 class LatexTemplate {
	/**
	 * Generate a PDF file using xelatex and pass it to the user
	 */
	public static function download($data, $template_file, $outp_file) {
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
	public static function escape($text) {
		//http://stackoverflow.com/questions/2627135/how-do-i-sanitize-latex-input
		// Prepare backslash/newline handling
		$text = str_replace("\n", "\\\\", $text); // Rescue newlines
		$text = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $text); // Strip all non-printables
		$text = str_replace("\\\\", "\n", $text); // Re-insert newlines and clear \\
		$text = str_replace("\\", "\\\\", $text); // Use double-backslash to signal a backslash in the input (escaped in the final step).
	
		// Symbols which are used in LaTeX syntax
		$text = str_replace("{", "\\{", $text);
		$text = str_replace("}", "\\}", $text);
		$text = str_replace("^", "\\textasciicircum{}", $text);
		$text = str_replace("_", "\\_", $text);
		$text = str_replace("~", "\\textasciitilde{}", $text);
		$text = str_replace("%", "\\%", $text);
	
		// Clean up backslashes from before
		$text = str_replace("\\\\", "\\textbackslash{}", $text); // Substitute backslashes from first step.
		$text = str_replace("\n", "\\\\", trim($text)); // Replace newlines (trim is in case of leading \\)
		return $text;
	}
}
