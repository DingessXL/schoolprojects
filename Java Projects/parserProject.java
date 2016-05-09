//Parser
import java.util.*;
import java.io.*;

public class parserProject
{
	public static void main(String[]args) throws IOException
	{
		File file = new File("input.txt");
		Scanner scan = new Scanner(file);
		String [] pieces;
		final int ERROR = -1; 
		boolean invalid = false;
		boolean finalState = false;
		int [][] DTable = { 
				{1,2,4,7,8,-1,5,10},
				{1,3,-1,-1,-1,-1,-1,-1},
				{3,-1,-1,-1,-1,-1,-1,-1},
				{3,-1,-1,-1,-1,-1,-1,-1},
				{4,-1,4,-1,-1,-1,-1,-1},
				{-1,-1,-1,-1,-1,-1,6,-1},
				{-1,-1,-1,-1,-1,-1,-1,-1},
				{-1,-1,-1,-1,-1,-1,-1,-1},
				{-1,-1,-1,-1,-1,9,-1,-1},
				{-1,-1,-1,-1,-1,-1,-1,-1},
				{-1,-1,-1,-1,-1,-1,-1,-1}
		};

		HashMap<String, Integer> hm = new HashMap<String,Integer>();
		hm.put("d", 0);
		hm.put(".", 1);
		hm.put("L", 2);
		hm.put("opp", 3);
		hm.put("colon", 4);
		hm.put("equal", 5);
		hm.put("end", 6);
		hm.put("par", 7);

		HashMap <Integer, String> finalStates = new HashMap <Integer, String>();
		finalStates.put(1, "number");
		finalStates.put(3, "number");
		finalStates.put(4, "id");
		finalStates.put(6, "end");
		finalStates.put(7, "opp");
		finalStates.put(9, "assign");
		finalStates.put(10, "paranthesis");
		
		while(scan.hasNext()) //goes thru each line of the file
		{
			int currentState = 0;
			pieces = scan.nextLine().split(" ");

			for(int i = 0; i < pieces.length; i++)
			{
				String temp = pieces[i];

				for(int j =0; j < temp.length();j++)
				{
					int type = getType(hm, temp.charAt(j));

					if(type == -1)
					{
						System.out.println("Syntax error(-1)");
						invalid = true;
						break;
					}

					currentState = DTable[currentState][type];

					if(currentState == ERROR)
					{
						System.out.println("Syntax error(current State Table)");
						invalid = true;
						break;
					}
				}
				

				if(invalid)
				{
					break;
				}
				
				if(!finalStates.containsKey(currentState))
				{
					System.out.println("Syntax error");
					break;
				}
				System.out.println(finalStates.get(currentState));
				currentState = 0;
			}
			
		}
		scan.close();

	}


	public static int getType(HashMap<String,Integer> hm, char c)
	{
		String type= null;
		boolean noError = true;

				if(Character.isDigit(c))
					type = "d";
				else if(c == '.')
					type = ".";
				else if(Character.isLetter(c))
					type = "L";
				else if(c == '+' || c == '-' || c == '*' || c == '/')
					type = "opp";
				else if(c == ':')
					type = "colon";
				else if(c == '=')
					type = "equal";
				else if(c == '$')
					type = "end";
				else if(c == '(' || c == ')')
					type = "par";
				else 
					return -1;

		return hm.get(type);
	}
}