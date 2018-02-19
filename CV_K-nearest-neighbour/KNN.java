import java.io.BufferedReader;
import static java.util.Comparator.comparing;

import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.text.DecimalFormat;
import java.util.ArrayList;
import java.util.List;
import java.util.stream.IntStream;
import org.apache.commons.cli.CommandLine;
import org.apache.commons.cli.CommandLineParser;
import org.apache.commons.cli.DefaultParser;
import org.apache.commons.cli.Options;


public class KNN {

	static int numOfClasses;


	public static void main(String [] args) throws IOException  {

			
		String filePathTrain = null;
		String filePathTest = null;
		List<Double> calculations = new ArrayList<Double>();
		
		Options options = new Options();
	        options.addOption("i", false, "Podrobnejsi izpis");
	        options.addOption("t", true, "Ucna mnozica");
	        options.addOption("T", true, "Testna mnozica");
	        options.addOption("k", true,"Stevilo sosedov");

	        CommandLineParser parser = new DefaultParser();
	        CommandLine cmd = null;
	        try {
	            cmd = parser.parse(options, args);
	        } catch (Exception e) { e.printStackTrace(); }

	
	        String ucna = cmd.getOptionValue("t");
	        if (ucna != null) { 
	        System.out.println("Train data " +  ucna);
	        filePathTrain = "C:/Users/gpode/Desktop/New Folder (4)/"+cmd.getOptionValue("t");
	        }

	        String testna = cmd.getOptionValue("T");
	        if (testna != null) {
	       	System.out.println("Test data " +  testna);
	        filePathTest = "C:/Users/gpode/Desktop/New Folder (4)/"+cmd.getOptionValue("T");
	        }
	        
	        String tmp = cmd.getOptionValue("k");
	        int k = 0; // tule nastavi na 0
	        if(tmp != null) {
	        	System.out.println("number of k neighbours"+ tmp);
	        	System.out.println("-----------------------------------------------------------------");
	        	
	        	k = Integer.valueOf(tmp);	        
	        }
		
	
		List<Instance> instancesLearning = new ArrayList<>();
		//		<!------------------------------------------------------------------------------->

		List<String[]> learnData = getData(filePathTrain);
		for(int i = 0 ; i<learnData.size()-1;i++) {
		
		instancesLearning.add(createInstanceData(filePathTrain).get(i));} // ucni primeri

				<!------------------------------------------------------------------------------->
		List<Instance> instancesTesting = new ArrayList<>();
		
		List<String[]> testData = getData(filePathTest);
		for(int i = 0 ; i<testData.size()-1;i++) {
			instancesTesting.add(createInstanceData(filePathTest).get(i)); // testni primeri
	
		}
		//		<!------------------------------------------------------------------------------->


		defineDistance(instancesLearning,instancesTesting,learnData);
		int [][] confMatrix = setClassificationAndReturnMatrix(instancesLearning,instancesTesting,k);
		calculations = calcMatrix(confMatrix,instancesTesting);
		outputMatrix(confMatrix,instancesLearning);
		
		   if (cmd.hasOption("i")) {
	        
	    		System.out.println("Metrike: ");
	    		System.out.println("Precision :"+String.format("%.2f", calculations.get(0)));
	    		System.out.println("Accuracy :"+String.format("%.2f", calculations.get(1)));
	    		System.out.println("Recall :"+String.format("%.2f", calculations.get(2)));
	    		System.out.println("F-measure :"+String.format("%.2f", calculations.get(3)));
	        	
	        }

	}


	private static void outputMatrix(int[][] confMatrix, List<Instance> instancesLearning) {
		
		ArrayList<String> cls = getClasses(instancesLearning);
		String[] vrstica = new String [cls.size()];
		
		for(int i = 0 ; i < vrstica.length;i++) {
			vrstica[i] = cls.get(i);
		}
		
		System.out.println(String.format("%-15s%-15s%-15s", vrstica) + "< Napovedani Razredi");
		
		String [] p = new String[cls.size()];
		for (int i = 0; i < vrstica.length; i++) {
			for (int j = 0; j < vrstica.length; j++) {
				p[j] = String.valueOf(confMatrix[i][j]);
			}
			System.out.println(String.format("%-15s%-15s%-15s", p) + "| " + cls.get(i) );
			
		}

		
	}
	
	private static List<Double> calcMatrix(int[][] confMatrix,List<Instance> instancesTesting) {
		double accuracy = 0;
		double recallFull = 0;
		List<Double> precision = new ArrayList<Double>();
		List<Double> recall = new ArrayList<Double>();
		List<Double> fMeasure = new ArrayList<Double>();
		List<Double> calculations = new ArrayList<Double>();
		//calculate accuracy and recall
		for(int i = 0 ; i < confMatrix.length;i++) {
			double deljenec = confMatrix[i][i];
			double delitelj = 0;
			for (int j = 0; j < confMatrix.length; j++) {

				delitelj += confMatrix[i][j];
			}
			//recall of certain class
			double Rc = deljenec/delitelj;
			//list of all recalls per class
			recall.add(Rc);			
			//accuracy 
			accuracy +=confMatrix[i][i];
			//sum of recall numbers
			recallFull += recall.get(i);
		}

		double precTmp = 0;
		double pr = 0;
		//calculate precision tp / tp+fp
		for (int i = 0; i < confMatrix.length; i++) {
			double deljenec = confMatrix[i][i];
			precTmp = 0;
			for (int j = 0; j < confMatrix.length; j++) {
				precTmp += confMatrix[j][i];	
			}
			double tmp = deljenec / precTmp;
			precision.add(tmp);
			pr += precision.get(i);
		}
		
		//callculate fscore per class
		for (int i = 0; i < confMatrix.length; i++) {
			double f = 2*((precision.get(i)*recall.get(i))/(precision.get(i)+recall.get(i)));
			fMeasure.add(f);
		}
		double fM = 0;
		//sum of fscores
		for (int i = 0; i < fMeasure.size(); i++) {
			fM += fMeasure.get(i);
		}
		
		double precisionFin = pr/precision.size();
		double accuracyFin = accuracy/instancesTesting.size();
		double recallFin = recallFull/recall.size();
		double fMeasureFin = fM/fMeasure.size();		
		calculations.add(precisionFin);
		calculations.add(accuracyFin);
		calculations.add(recallFin);
		calculations.add(fMeasureFin);
	
		return calculations;

	}

	private static int [][] setClassificationAndReturnMatrix(List<Instance> instancesLearning, List<Instance> instancesTesting, int k) {
		// razlicni classi
		ArrayList<String> cls = getClasses(instancesLearning);
		int [][] confMat = new int [cls.size()][cls.size()];
		for(int j = 0 ; j < instancesTesting.size();j++) {
			double [] tmp = new double[instancesLearning.size()];
			for(int i = 0 ; i < instancesLearning.size();i++) {
				tmp[i] = instancesTesting.get(j).getResults().get(i);
			}
   
			

			// gets k number of instances (from lowest rank up)
			int [] indexes = bottomN(tmp,k);
			int nOc = cls.size();
			numOfClasses = nOc;

			int t = 0;
			int f = 0;
			String testClass = null;
			String learnClass = null;
			
			for(int n = 0 ; n<indexes.length;n++) {
				if(instancesTesting.get(j).getClassification().equals(instancesLearning.get(indexes[n]).getClassification())){
					t++;
					testClass = instancesTesting.get(j).getClassification();					
				}else {					
					testClass = instancesTesting.get(j).getClassification();
					learnClass = instancesLearning.get(indexes[n]).getClassification();
					f++;
				}
			}

			int n = 0;
			int l = 0;
			for(int i = 0 ; i < cls.size();i++) {
				if(cls.get(i).equals(testClass))
					n = i;
				if(cls.get(i).equals(learnClass))
					l = i;
			}		
			if(t>f) {
				confMat[n][n] += 1;			
			}else {	
				confMat[n][l] += 1;
			}
		}

		return confMat;

	}


	private static ArrayList<String> getClasses(List<Instance> instancesLearning) {

		ArrayList<String> cls = new ArrayList<>();
		for (int i = 0 ; i<instancesLearning.size() ; i++) {
			String tmp = instancesLearning.get(i).classification;
			if(!cls.contains(tmp)) {
				cls.add(tmp);
			}
		}
		return cls;
	}

	public static int[] bottomN(final double[] input, final int n) {

		return IntStream.range(0, input.length)
				.boxed()
				.sorted(comparing(i -> input[i]))
				.mapToInt(i -> i)
				.limit(n)
				.toArray();
	}


	public static int findMinIdx(double[] numbers) {
		if (numbers == null || numbers.length == 0) return -1; // Saves time for empty array
		double minVal = numbers[0]; // Keeps a running count of the smallest value so far
		int minIdx = 0; // Will store the index of minVal
		for(int idx=1; idx<numbers.length; idx++) {
			if(numbers[idx] < minVal) {
				minVal = numbers[idx];
				minIdx = idx;
			}
		}
		return minIdx;
	}


	private static void defineDistance(List<Instance> instancesLearning, List<Instance> instancesTesting,List<String[]> learnData) {

		double a1;
		double a2;
		for(int i = 0 ; i < instancesTesting.size();i++) {

			for(int j = 0 ; j < instancesLearning.size();j++) {
				double[] t = new double[learnData.get(0).length-1];
				for(int n = 0 ; n < learnData.get(0).length-1 ;n++) {
					a1=instancesLearning.get(j).getData().get(n);
					a2=instancesTesting.get(i).getData().get(n);
					t[n]=Math.pow((a1-a2),2);
				}
				double tmpD = calculateDistance(t);
				instancesTesting.get(i).results.add(tmpD);
			}
		}
	}

	//calculates distance (manhatan)
	private static double calculateDistance(double[] t) {
		// TODO Auto-generated method stub
		double tmp = 0;
		for(int i = 0 ; i < t.length;i++ ) {
			tmp += t[i];	
		}
		return Math.sqrt(tmp);
	}

	//we save the data we get from the arrays into an array list for easier manipulation
	private static List<Instance> createInstanceData(String fp) throws IOException {

		List<Instance> instances = new ArrayList<>();
		instances.clear();
		List<String[]> learnData = getData(fp);
		String classificationTmp;

		for(int i = 1 ; i<learnData.size();i++) {
			List<Double> d = new ArrayList<Double>();
			Instance tmp = new Instance(null,null);
			classificationTmp = learnData.get(i)[learnData.get(i).length-1];
			Double[] tmpD = new Double[learnData.get(i).length-1];
			for(int j = 0 ; j < learnData.get(0).length-1;j++) {
				if(j == 0)
					tmpD = new Double[learnData.get(j).length];
				tmpD[j] = Double.valueOf(learnData.get(i)[j]);
				d.add(tmpD[j]);
				tmp.setData(d);

			}

			tmp.setData(d);
			tmp.setClassification(classificationTmp);
			instances.add(tmp);	
		}
		return  instances;
	}

	public static List<String[]> getData(String filePath) throws IOException{

		List<String[]> data = new ArrayList<>();
		try{
			BufferedReader reader = new BufferedReader(new FileReader(filePath));
			String line;
			while((line = reader.readLine()) !=null){
				
				data.add(line.split(","));
			}
			reader.close();
		}catch (FileNotFoundException e){
			e.printStackTrace();
		}			
		return data;
	}
}

class Instance {

	public List<Double> getData() {
		return data;
	}
	public void setData(List<Double> data) {
		this.data = data;
	}
	public String getClassification() {
		return classification;
	}
	public void setClassification(String classification) {
		this.classification = classification;
	}
	public List<Double> getDistance() {
		return results;
	}
	public void setDistance(List<Double> results) {
		this.results = results;
	}

	public List<Double> getResults() {
		return results;
	}
	public void setResults(List<Double> results) {
		this.results = results;
	}

	//saving the values of the attributes of a defined example
	List<Double> data = new ArrayList<Double>();
	List<Double> results = new ArrayList<Double>();
	//saving the classification of a defined example
	String classification;

	Instance(List<Double> data,String classification){
		this.data = data;
		this.classification = classification;
	}
}

class Results {

	public double getDistance() {
		return distance;
	}
	public void setDistance(double distance) {
		this.distance = distance;
	}

	double distance;


	Results(double distance){
		this.distance = distance;
	}
}



