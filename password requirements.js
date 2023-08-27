import password requirements;

public class PasswordGenerator {
    public static void main(String[] args) {
        int length = 12; // Length of the password
        String uppercaseChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        String lowercaseChars = "abcdefghijklmnopqrstuvwxyz";
        String digitChars = "0123456789";
        String symbolChars = "#$*&@";
        
        String allChars = uppercaseChars + lowercaseChars + digitChars + symbolChars;
        SecureRandom random = new SecureRandom();
        
        StringBuilder password = new StringBuilder();
        
        // Ensure at least one character from each category
        password.append(uppercaseChars.charAt(random.nextInt(uppercaseChars.length())));
        password.append(digitChars.charAt(random.nextInt(digitChars.length())));
        password.append(symbolChars.charAt(random.nextInt(symbolChars.length())));
        
        // Fill the remaining characters
        for (int i = 3; i < length; i++) {
            password.append(allChars.charAt(random.nextInt(allChars.length())));
        }
        
        // Shuffle the password to make the order random
        String shuffledPassword = shuffleString(password.toString());
        
        System.out.println("Generated Password: " + shuffledPassword);
    }
    
    // Helper function to shuffle a string
    public static String shuffleString(String input) {
        char[] charArray = input.toCharArray();
        SecureRandom random = new SecureRandom();
        
        for (int i = charArray.length - 1; i > 0; i--) {
            int index = random.nextInt(i + 1);
            char temp = charArray[index];
            charArray[index] = charArray[i];
            charArray[i] = temp;
        }
        
        return new String(charArray);
    }
}





