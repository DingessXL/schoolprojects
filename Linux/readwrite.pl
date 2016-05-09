#!/usr/local/bin/perl -w

use warnings;
#specify text file
my $file = 'data.txt';
#open file for read
open(my $fh, '<:encoding(UTF-8)', $file)
	or die "Can't open file '$file' $!";

#initialize array for lines
my @lines;
#read lines into array
while (my $row = <$fh>){
	push (@lines, $row);
	#take away hastags to print in the terminal
	#chomp $row;
	#print "$row\n"
}
#close file
close $fh or die "Can't close $file:$!";

#open file for read
open(my $fh2, '>>:encoding(UTF-8)', $file)
	or die "Can't open file '$file' $!";
#print out array to the file
print $fh2 @lines;
close $fh2 or die "Can't close $file:$!";

